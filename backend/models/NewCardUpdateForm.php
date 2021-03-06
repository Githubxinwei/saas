<?php
namespace backend\models;

use common\models\base\MemberCard;
use common\models\base\Member;
use common\models\base\MemberDetails;
use common\models\base\CardCategory;
use common\models\base\ConsumptionHistory;
use common\models\base\Order;
use common\models\base\Employee;
use common\models\base\LimitCardNumber;
use common\models\base\CardDiscount;
use common\models\base\VenueLimitTimes;
use yii\base\Model;
use common\models\Func;
use common\models\base\MemberDeposit;
use common\models\base\MemberDealRecord;
use common\models\base\Deal;
use common\models\base\DealType;
use Yii;
class NewCardUpdateForm extends Model
{
    public $cardId;       //旧会员卡id
    public $seller;       //销售员
    public $newCardId;    //新卡种id
    public $card_number;   //设置卡号
    public $payAmount;     // 补交金额
    public $amountMoney;   //金额 售价是为空 区间价是有值
    public $discount;      //折扣
    public $dueTime;      //新会员卡到期时间
    public $upStartTime;   //新会员卡创建时间
    public $venueId;
    public $note;   //备注
    public $depositArrId;   //使用定金的id数组
    public $payType;        //付款类型1.全款,2押金
    /**
     * 云运动 - 会员管理 - 会员卡升级 表单规则验证
     * @author 黄华<huanghua@itsports.club>
     * @create 2017/9/14
     * @return array
     */
    public function rules()
    {
        return [
            [['cardId','card_number','payAmount','amountMoney','discount','dueTime','upStartTime','note','payType','depositArrId'],'safe'],

            ['card_number', 'unique', 'targetClass' => '\common\models\base\MemberCard', 'message' => '会员卡号已存在！'],

            ['seller','required','message' => '请选择销售员'],

            ['newCardId','required','message' => '请选择卡种'],
        ];
    }

    /**
     * @云运动 - 会员管理 - 会员卡升级
     * @author huanghua <huanghua@itsports.club>
     * @create 2017/9/14
     * @inheritdoc
     */
    public function newSaveCardUpdate($companyId,$venueId)
    {
        $this->venueId    = $venueId;
        $oldCard          = MemberCard::findOne(['id' => $this->cardId]);//旧卡数据
        $member           = Member::findOne(['id' => $oldCard['member_id']]);//旧卡关联的会员数据
        $cardCategory     = CardCategory::findOne(['id' => $this->newCardId]);//新卡种id
        $time             = json_decode($cardCategory['duration'],true);//有效期
        $leave            = json_decode($cardCategory['leave_long_limit'],true);//最长请假天数
        $memberNum = MemberCard::findOne(['card_number'=>$this->card_number]);
        if(!empty($memberNum)){
            return "会员卡号已存在!";
        }
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $member->counselor_id         = $this->seller;
            $member = $member->save() ? $member : $member->errors;
            if(!isset($member->id)){
                throw new \Exception('操作失败');
            }

            $consultantChange = new ConsultantChangeRecord();
            $consultantChange->member_id      = $member['id'];
            $consultantChange->create_id      = $this->getCreate();
            $consultantChange->created_at     = time();
            $consultantChange->consultant_id  = $this->seller;
            $consultantChange->venue_id       = $member['venue_id'];
            $consultantChange->company_id     = $member['company_id'];
            $consultantChange->behavior       = 5;
            if(!$consultantChange->save()){
                \Yii::trace($consultantChange->errors);
                throw new \Exception('会籍记录新增失败');
            }

            $oldCard ->status = "2";
            $oldCard = $oldCard->save() ? $oldCard : $oldCard->errors;
            if(!isset($oldCard->id)){
                throw new \Exception('操作失败');
            }

            $memberCard                     = new MemberCard();
            $memberCard->member_id          = $member['id'];                               //会员ID
            $memberCard->card_category_id   = $this->newCardId;                           //卡种
            $memberCard->card_number        = !empty($this->card_number)?"$this->card_number":(string)'0'.mt_rand(0,10).time();
            $memberCard->create_at          = $this->upStartTime;                                      //时间
            if(empty($cardCategory['sell_price'])){
                $memberCard->amount_money       = $this->amountMoney;  //区间价
            }else{
                $memberCard->amount_money       = $cardCategory['sell_price'];            //一口售价
            }
            $memberCard->status             = 1;                                        //状态
            $memberCard->payment_type       = 1;                                        //付款方式
            $memberCard->is_complete_pay    = 1;                                       //完成付款
            $memberCard->total_times        = $cardCategory['times'];                  //总次数(次卡)
            $memberCard->consumption_times  = 0;                                       //消费次数
            $memberCard->invalid_time       = $this->dueTime;          //失效时间
            $memberCard->level              = 1;                                       //等级
            $memberCard->employee_id        = $this->seller;                          //销售
            $memberCard->card_name          = $cardCategory['card_name'];              //卡名
            $memberCard->another_name       = $cardCategory['another_name'];          //另一个卡名
            $memberCard->card_type          = $cardCategory['category_type_id'];      //卡类别
            $memberCard->count_method       = $cardCategory['count_method'];          //计次方式
            $memberCard->attributes         = $cardCategory['attributes'];             //属性
            $memberCard->active_limit_time  = $cardCategory['active_time'];            //激活期限
            $memberCard->transfer_num       = $cardCategory['transfer_number'];       //转让次数
            $memberCard->surplus            = $cardCategory['transfer_number'];       //剩余转让次数
            $memberCard->transfer_price     = $cardCategory['transfer_price'];        //转让金额
            $memberCard->recharge_price     = $cardCategory['recharge_price'];        //充值卡充值金额
            $memberCard->present_money      = $cardCategory['recharge_give_price'];  //买赠金额
            $memberCard->renew_price        = $cardCategory['renew_price'];           //续费价
            $memberCard->renew_best_price   = $cardCategory['offer_price'];          //续费优惠价
            $memberCard->renew_unit         = $cardCategory['renew_unit'];            //续费多长时间/天
            $memberCard->leave_total_days   = $cardCategory['leave_total_days'];     //请假总天数
            $memberCard->leave_least_days   = $cardCategory['leave_least_Days'];     //每次请假最少天数
            $memberCard->leave_days_times   = json_encode($leave);                   //每次请假天数、请假次数
            $memberCard->deal_id             = $cardCategory['deal_id'];               //合同id
            $memberCard->active_time         = time();
            $memberCard->duration            = $time['day'];                          //有效期
            $memberCard->company_id          = $companyId;                            //公司id
            $memberCard->venue_id            = $venueId;                              //场馆id
            $memberCard->usage_mode          = $oldCard['usage_mode'];
            $memberCard->note                = $this->note;
            $memberCard->bring               = $cardCategory['bring'];//是否带人
            $memberCard->validity_renewal    = $cardCategory['validity_renewal'];//有效期续费
            $memberCard = $memberCard->save() ? $memberCard : $memberCard->errors;
            if(!isset($memberCard->id)){
                throw new \Exception('操作失败');
            }else{
                //老会员卡是否有请假增加的时间
                $leaveRecord = LeaveRecord::find()
                    ->where(['and',['leave_employee_id'=>$oldCard['member_id']],['member_card_id'=>$oldCard['id']],['status'=>2]])
                    ->asArray()
                    ->all();
                if(!empty($leaveRecord)){
                    foreach ($leaveRecord as $k=>$v) {
                        $leaveRecordOne           = LeaveRecord::findOne(['id' => $v['id']]);
                        $leaveTime                = $leaveRecordOne['leave_end_time'] - $leaveRecordOne['leave_start_time'];
                        $memberCard->invalid_time = $memberCard['invalid_time']+$leaveTime;
                    }
                    $memberCard->save();
                }
                //老会员卡是否有赠送天数
                $giftRecord = GiftRecord::find()
                    ->where(['and',['member_id'=>$oldCard['member_id']],['member_card_id'=>$oldCard['id']],['status'=>2],['class_type'=>'day'],['type'=>1]])
                    ->asArray()
                    ->all();
                if(!empty($giftRecord)){
                    foreach ($giftRecord as $k=>$v) {
                        $giftRecordOne            = GiftRecord::findOne(['id' => $v['id']]);
                        $giftTime                 = $giftRecordOne['num']*24*60*60;
                        $memberCard->invalid_time = $memberCard['invalid_time']+$giftTime;
                    }
                    $memberCard->save();
                }

                $consumption                        = new ConsumptionHistory();
                $consumption->member_id             = $member['id'];                                     //会员id
                $consumption->consumption_type      = 'card';                                            //消费类型
                $consumption->type                  = 1;                                                 //消费方式
                $consumption->consumption_type_id   = $memberCard->id;                                   //消费项目id
                $consumption->consumption_date      = time();                                            //消费日期
                $consumption->consumption_amount    = $this->payAmount;                                  //消费金额
                $consumption->cash_payment          = $this->payAmount;                                  //现金付款
                $consumption->consumption_time      = time();                                            //消费时间
                $consumption->consumption_times     = 1;                                                 //消费次数
                $consumption->venue_id              = $venueId;                                          //场馆id
                $consumption->seller_id             = $this->seller;                                     //销售员id
                $consumption->describe              = json_encode('由'.$oldCard->card_name.'升级为'.$cardCategory->card_name);    //消费描述
                $consumption->category              = '升级';
                $consumption->company_id            = $companyId;
                $consumption->remarks               = $memberCard['note'];
                $consumption = $consumption->save() ? $consumption : $consumption->errors;
                if(!isset($consumption->id)){
                    throw new \Exception('操作失败');
                }
            }
            $order = $this->saveOrder($member,$memberCard,$cardCategory,$companyId,$venueId);
            if(!isset($order->id)){
                throw new \Exception('操作失败');
            }
            $limit = $this->saveLimit();
            if(!isset($limit->id)){
                return $limit;
            }

            $limit = $this->saveVenueLimit($memberCard,$cardCategory);
            if($limit !== true){
                return $limit;
            }

            if(!empty($this->discount)){
                $discount = $this->saveCardDiscount();
                if(!isset($discount->id)){
                    throw new \Exception('操作失败');
                }
            }

            $bindMemberCard = $this->saveBindCard($memberCard);
            if($bindMemberCard !== true){
                return $bindMemberCard;
            }

            $dealRecord = $this->saveDealRecord($cardCategory,$memberCard);
            if($dealRecord !== true){
                return $dealRecord;
            }

            //存在定金时执行的操作
            if(($this->payType)==2 && !empty($this->depositArrId)){
                MemberDeposit::updateAll(['is_use'=>'2'],['id'=>$this->depositArrId]);
            }
            if ($transaction->commit() === null) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            //如果抛出错误则进入catch，先callback，然后捕获错误，返回错误
            $transaction->rollBack();
            return  $e->getMessage();
        }
    }

    /**
     * 云运动 - 售卡系统 - 存储卡种剩余张数
     * @author 朱梦珂<zhumengke@itsports.club>
     * @create 2017/5/23
     * @return array
     */
    public function saveLimit()
    {
        $limitCardNum = LimitCardNumber::find()
            ->where(['and',
                ['card_category_id' => $this->newCardId],
                ['venue_id'=>$this->venueId],
                ['is not','limit',NULL]
            ])
            ->select('id,limit,surplus')
            ->asArray()->one();
        if(isset($limitCardNum)){
            $limitCardNum = LimitCardNumber::findOne(['id' => $limitCardNum['id']]);
        }
        if($limitCardNum['limit'] == -1){
            $limitCardNum->surplus = -1;
        }else{
            if($limitCardNum['surplus'] <= 0){
                $limitCardNum->surplus = 0;
            }else{
                $limitCardNum->surplus = $limitCardNum['surplus'] - 1;
            }
        }
        $limitCardNum = $limitCardNum->save() ? $limitCardNum : $limitCardNum->errors;
        if ($limitCardNum) {
            return $limitCardNum;
        }else{
            return $limitCardNum->errors;
        }
    }

    /**
     * 云运动 - 售卡系统 - 存储进场次数核算表
     * @author 朱梦珂<zhumengke@itsports.club>
     * @create 2017/6/23
     * @return array
     */
    public function saveVenueLimit($memberCard,$cardCategory)
    {
        $limit = LimitCardNumber::find()->where(['card_category_id' => $this->newCardId,'status'=>[1,3]])->asArray()->all();
        if(isset($limit)){
            foreach($limit as $k=>$v){
                $limitVenue = new VenueLimitTimes();
                $limitVenue->member_card_id = $memberCard->id;
                $limitVenue->venue_id       = $v['venue_id'];
                $limitVenue->total_times    = $v['times'];
                $limitVenue->level          = $v['level'];
                if(!empty($v['times'])){
                    $limitVenue->overplus_times = $v['times'];
                }else{
                    $limitVenue->overplus_times = $v['week_times'];
                }
                $limitVenue->week_times     = $v['week_times'];
                $limitVenue->venue_ids      = $v['venue_ids'];
                $limitVenue->company_id     = $cardCategory->company_id;
                if(!$limitVenue->save()){
                    return $limitVenue->errors;
                }
            }
            return true;
        }
        return true;
    }
    /**
     * 云运动 - 售卡系统 - 存储订单表
     * @author 黄华<huanghua@itsports.club>
     * @create 2017/8/11
     * @param $member
     * @param $memberCard
     * @param $cardCategory
     * @param $companyId
     * @param $venueId
     * @return array
     */
    public function saveOrder($member,$memberCard,$cardCategory,$companyId,$venueId)
    {
        $saleName      = Employee::findOne(['id' => $this->seller]);
        $adminModel    = Employee::findOne(['admin_user_id'=>\Yii::$app->user->identity->id]);
        $memberDetails = MemberDetails::findOne(['member_id'=>$member['id']]);
        $order                  = new Order();

        $order->venue_id            = $venueId;                                              //场馆id
        $order->company_id          = $companyId;                                           //公司id
        $order->member_id           = $member->id;                                          //会员id
        $order->card_category_id    = $memberCard->id;                                     //会员卡id
        $order->order_time          = time();                                               //订单创建时间
        $order->pay_money_time      = time();                                               //付款时间
        $order->pay_money_mode      = 1;                                    //付款方式
        $order->sell_people_id      = $saleName['id'];                                      //售卖人id
        $order->create_id           = isset($adminModel->id)?intval($adminModel->id):0;    //操作人id
        $order->payee_id            = isset($adminModel->id)?intval($adminModel->id):0;    //操作人id
        $order->status              = 2;                                                     //订单状态：2已付款
        $order->note                = '升级';                                                //备注
        $number                     = Func::setOrderNumber();
        $order->order_number        = "{$number}";                                           //订单编号
        $order->all_price           = $this->payAmount;                                     //商品总价格
        $order->total_price         = $this->payAmount;                                     //总价
        $order->card_name           = $cardCategory->card_name;                              //卡名称
        $order->sell_people_name    = $saleName['name'];                                     //售卖人姓名
        $order->payee_name          = $adminModel['name'];                                     //收款人姓名
        $order->member_name         = $memberDetails['name'];                                           //购买人姓名
        $order->pay_people_name     = $memberDetails['name'];                                           //付款人姓名
        $order->consumption_type    = 'card';
        $order->consumption_type_id = $memberCard->id;
        $order->new_note = $memberCard['note'];
        $order = $order->save() ? $order : $order->errors;
        if ($order) {
            return $order;
        }else{
            return $order->errors;
        }
    }

    /**
     * 云运动 - 升级 - 存储卡种剩余张数
     * @author huanghua<zhumengke@itsports.club>
     * @create 2017/9/16
     * @return array
     */
    public function saveCardDiscount()
    {
        $limitCardNum = LimitCardNumber::findOne(['card_category_id' => $this->newCardId]);
        $discountData = CardDiscount::find()->where(['limit_card_id'=>$limitCardNum['id']])->andWhere(['id'=>$this->discount])->asArray()->one();
        $discount     = CardDiscount::findOne(['id'=>$discountData['id']]);
        if($discountData['surplus'] == -1){
            $discount->surplus = 1;
        }else{
            if($discountData['surplus'] <= 0){
                $discount->surplus  = 0;
            }else{
                $discount->surplus  = $discountData['surplus'] - 1;
            }
        }
        $discount = $discount->save() ? $discount : $discount->errors;
        if ($discount) {
            return $discount;
        }else{
            return $discount->errors;
        }
    }

    public function getCreate()
    {
        if(isset(\Yii::$app->user->identity) && !empty(\Yii::$app->user->identity)){
            $create = Employee::findOne(['admin_user_id'=>\Yii::$app->user->identity->id]);
            $create = isset($create->id)?intval($create->id):0;
            return $create;
        }
        return 0;
    }

    /**
     * 云运动 - 会员升级 - 存储会员卡绑定套餐表
     * @author huanghua<huanghua@itsports.club>
     * @param $memberCard
     * @create 2018/4/22
     * @return array
     */
    public function saveBindCard($memberCard)
    {
        $bindData = BindPack::find()->where(['card_category_id' => $this->newCardId])->asArray()->all();
        if(isset($bindData)){
            foreach($bindData as $k=>$v){
                $memberBindCard = new BindMemberCard();
                $memberBindCard->member_card_id    = $memberCard->id;
                $memberBindCard->venue_id          = $v['venue_id'];
                $memberBindCard->company_id        = $v['company_id'];
                $memberBindCard->polymorphic_id    = $v['polymorphic_id'];
                $memberBindCard->polymorphic_type  = $v['polymorphic_type'];
                $memberBindCard->number            = $v['number'];
                $memberBindCard->status            = $v['status'];
                $memberBindCard->polymorphic_ids   = $v['polymorphic_ids'];
                if(!$memberBindCard->save()){
                    return $memberBindCard->errors;
                }
            }
            return true;
        }
        return true;
    }

    /**
     * 云运动 - 升级系统 - 存储绑定合同记录表
     * @author huanghua<huanghua@itsports.club>
     * @param $cardCategory
     * @param $memberCard
     * @create 2018/5/4
     * @return array
     */
    public function saveDealRecord($cardCategory,$memberCard)
    {
        $dealId        = Deal::find()->where(['and',['type'=>1],['id'=>$cardCategory['deal_id']]])->asArray()->one();
        if (!empty($dealId)){
            $dealDetailsId = DealType::findOne(['id'=>$dealId['deal_type_id']]);
            $dealRecord    = MemberDealRecord::findOne(['type' => 1,'type_id' => $memberCard['id'],'member_id' => $memberCard['member_id']]);
            if(empty($dealRecord)){
                $dealRecord = new MemberDealRecord();
            }
            $dealRecord->type             = 1;
            $dealRecord->type_id          = $memberCard['id'];
            $dealRecord->member_id        = $memberCard['member_id'];
            $dealRecord->deal_number      = 'sp'.time().mt_rand(10000,99999);
            $dealRecord->type_name        = $dealDetailsId['type_name'];
            $dealRecord->intro            = $dealId['intro'];
            $dealRecord->company_id       = $memberCard['company_id'];
            $dealRecord->venue_id         = $memberCard['venue_id'];
            $dealRecord->create_at        = time();
            $dealRecord->name             = $dealId['name'];
            if(!$dealRecord->save()){
                return $dealRecord->errors;
            }
            $card = MemberCard::findOne(['id'=>$memberCard['id']]);
            $card ->deal_id = $dealRecord['id'];
            if(!$card->save()){
                return $card->errors;
            }
            return true;
        }else{
            return true;
        }

    }
}