<div style="margin-left: 220px;" class="modal fade" id="myModals2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="margin-top: 50px;width: 90%;" class="modal-dialog">
        <div style="border: none;" class="modal-content clearfix">
            <div style="border: none;" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div class="panel blank-panel col-sm-12">
                    <div class="panel-heading">
                        <div class="panel-title m-b-md">
                            <h3 style="font-size: 24px;text-align: center;">会员详情信息</h3>
                        </div>
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="tabs_panels.html#tab-1" ng-click="getMemberDetail(data.id)">
                                        <span>资料</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="tabs_panels.html#tab-2" ng-click="getMemCard(data.id)">
                                        <span >会员卡</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="tabs_panels.html#tab-3" ng-click="getChargeClass(data.id)">
                                        <span>私教课信息</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="tabs_panels.html#tab-4" ng-click="getGroupClass(data.id)">
                                        <span>团课</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="tabs_panels.html#tab-8" ng-click="getYardRecord()">
                                        <span>场地记录</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="tabs_panels.html#tab-5" ng-click="getCabinet(data.id)">
                                        <span>柜子</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="tabs_panels.html#tab-6" ng-click="getGift(data.id)">
                                        <span>信息记录</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="tabs_panels.html#tab-7" ng-click="getLeaveRecord(data.id)">
                                        <span>请假</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="tabs_panels.html#tab-13" ng-click="getHistory(data.id)">
                                        <span>消费</span>
                                    </a>
                                </li>
                                <!--                                    <li>-->
                                <!--                                        <a data-toggle="tab" href="tabs_panels.html#tab-10">-->
                                <!--                                            <span>跟进维护</span>-->
                                <!--                                        </a>-->
                                <!--                                    </li>-->
                                <!--                                    <li>-->
                                <!--                                        <a data-toggle="tab" href="tabs_panels.html#tab-11">-->
                                <!--                                            <span>转介绍</span>-->
                                <!--                                        </a>-->
                                <!--                                    </li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="tab-1" style="margin-top: 20px;" class="col-sm-12 tab-pane active">
                                <div class="col-sm-6 text-right">
                                    <h4 style="margin-top: 20px;width: 160px;" class="img-circle" ng-if="memberData.pic != null"><img ng-src="{{memberData.pic}}" style="width: 150px;height: 150px;border-radius: 50%"></h4>
                                    <h4 style="margin-top: 20px;width: 160px;" class="img-circle" ng-if="memberData.pic == null"><img ng-src="/plugins/checkCard/img/11.png" style="width: 150px;height: 150px"></h4>
                                </div>
                                <div class="col-sm-6">
                                    <h4 style="font-size: 18px;">个人信息</h4>
                                    <h4 style="font-size: 15px;margin-top: 20px">{{MemberData.name | noData:''}}</h4>
                                    <p style="margin-top: 10px;">会员编号：{{MemberData.id}}</p>
                                    <p style="margin-top: 10px;">会员性别：<span ng-if=MemberData.sex==1>男</span><span ng-if=MemberData.sex==2>女</span></p>
                                    <p style="margin-top: 10px;">手机号码：<span ng-if="MemberData.mobile == 0">暂无数据</span> <span ng-if="MemberData.mobile != 0">{{MemberData.mobile| noData:''}}</span></p>
                                    <p style="margin-top: 10px;">出生日期：{{MemberData.birth_date| noData:''}}</p>
                                    <!--<p style="margin-top: 10px;">会员工作：{{MemberData.profession| noData:''}}</p>-->
                                    <p style="margin-top: 10px;">会籍顾问：<span>{{MemberData.employee.name| noData:''}}</span></p>
                                    <p style="margin-top: 10px;">私教名称：<span>{{MemberData.personalName| noData:''}}</span></p>
                                    <p style="margin-top: 10px;">证件号码：{{MemberData.id_card| noData:''}}</p>
                                    <p style="margin-top: 10px;">IC卡号码：
                                        <span ng-if="MemberData.status == '1'">{{MemberData.custom_ic_number| noData:''}}</span>
                                        <span ng-if="MemberData.status == '2'">暂无数据</span>
                                    </p>
                                    <p style="margin-top: 10px;">家庭住址：{{MemberData.family_address| noData:''}}</p>
                                    <p style="margin-top: 10px;">会员备注&nbsp;: {{MemberData.note | noData : ''}}</p>
                                </div>
                                <div class="col-sm-12" style="margin-top: 20px;">
                                    <!--                                    <button class="btn btn-info" data-toggle="modal" data-target="#myModals5" ng-click="getMemberUpdate(data.id)">&nbsp;&nbsp;&nbsp;&nbsp;修改&nbsp;&nbsp;&nbsp;&nbsp;</button>-->
                                    <button class="btn btn-success pull-right" data-dismiss="modal" aria-hidden="true">&nbsp;&nbsp;&nbsp;&nbsp;关闭&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>会员卡信息列表</h5>
                                        <div class="col-sm-3 fr text-right " style="margin-top: -12px;">
                                            <?php if (\backend\models\AuthRole::canRoleByAuth('checkCard', 'EXCHANGEDATA')) { ?>
                                            <button class="ladda-button btn btn-default " data-toggle="modal" data-target="#myCardModals12">
                                                交换数据
                                            </button>
                                            <?php } ?>
                                        </div>
<!--                                        <div style="background: #fff;border: 1px solid #dee5e7;border-radius: 4px;" class="col-xs-12">-->
<!--                                            <div style="margin-top: 20px;" class="col-sm-2">-->
<!--                                                -->
<!--                                            </div>-->
<!--                                        </div>-->


                                    </div>
                                    <div class="ibox-content" style="padding: 0">
                                        <div style="padding-bottom: 0;height: 300px;overflow: scroll" id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">卡名称</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 120px;">卡号</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 120px;">办理日期</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">有效期</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 120px;">总次数</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 120px;">剩余次数</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 140px;">总金额</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">会籍顾问</th>
<!--                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 140px;">操作</th>-->
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat = 'item in items' >
                                                    <td>{{item.card_name| noData:''}}</td>
                                                    <td>{{item.card_number| noData:''}}</td>
                                                    <td>{{item.create_at *1000 | noData:''| date:'yyyy/MM/dd'}}</td>
                                                    <td>{{item.active_time *1000 | noData:''| date:'yyyy/MM/dd'}} - {{item.invalid_time *1000 | noData:''| date:'yyyy/MM/dd'}}</td>
                                                    <td>{{item.total_times | noData:'次'}}</td>
                                                    <td>{{item.total_times - item.consumption_times | noData:'次'}}</td>
                                                    <td>{{item.amount_money| noData:'元'}}</td>
                                                    <td>{{item.employee.name| noData:''}}</td>
<!--                                                    <td class="tdBtn2"><button class="btn-sm btn btn-success" data-toggle="modal" ng-click="updateMemCard(item.employee.id,item.invalid_time,item.id,item.member_id)" data-target="#myModals6">修改</button>&nbsp;<button class="btn btn-sm btn-danger" ng-click="delMemberCard(item.id)">删除</button></td>-->
                                                </tr>

                                                </tbody>
                                            </table>
                                            <?=$this->render('@app/views/common/pagination.php',['page'=>'memberCardPages']);?>
                                            <?=$this->render('@app/views/common/nodata.php',['name'=>'memberCardNoDataShow','text'=>'无会员卡记录','href'=>true]);?>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>私教课信息列表&nbsp;<span style="font-size: 12px;color: #999;font-weight: normal;">点击列表查看上课记录</span></h5>
                                    </div>
                                    <div class="ibox-content" style="padding: 0">
                                        <div style="padding-bottom: 0;height: 300px;overflow: scroll" id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">课程</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 120px;">剩余/总节数</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 120px;">办理日期</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">到期日期</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 120px;">办理金额</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 140px;">办理私教</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 140px;">操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat = 'charge in charges' ng-click="getChargeClassDetail(data.id,charge.id)">
                                                    <td data-toggle="modal" data-target="#myModals9">{{charge.product_name | noData:''}}</td>
                                                    <td data-toggle="modal" data-target="#myModals9">{{charge.overage_section | noData:''}}/{{charge.course_amount | noData:''}}</td>
                                                    <td data-toggle="modal" data-target="#myModals9">{{charge.create_at *1000 | noData:''| date:'yyyy/MM/dd'}}</td>
                                                    <td data-toggle="modal" data-target="#myModals9">{{charge.deadline_time *1000 | noData:''| date:'yyyy/MM/dd'}}</td>
                                                    <td data-toggle="modal" data-target="#myModals9">{{charge.money_amount | noData:'元'}}</td>
                                                    <td data-toggle="modal" data-target="#myModals9">{{charge.employeeS.name | noData:''}}</td>
                                                    <td class="tdBtn2">
                                                        <!--                                                                <button class="btn-sm btn btn-success" data-toggle="modal" data-target="#myModals7">修改</button>-->
                                                        &nbsp;<button class="btn btn-sm btn-danger" ng-click="delChargeClass(charge.id)">删除</button></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <?=$this->render('@app/views/common/pagination.php',['page'=>'privatePages']);?>
                                            <?=$this->render('@app/views/common/nodata.php',['name'=>'privateNoDataShow','text'=>'无私教记录','href'=>true]);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-4" class="tab-pane">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>团课信息列表</h5>
                                    </div>
                                    <div class="ibox-content" style="padding: 0">
                                        <div style="padding-bottom: 0;height: 300px;overflow: scroll;" id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="position: relative;">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">场馆</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">卡名称</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">课程</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 80px;">场地</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">日期时间</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">打印小票</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">刷手环时间</th>
<!--                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">上课总次数</th>-->
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">上课情况</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">约课途径</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">教练</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat='group in groups'>
                                                    <td>{{group.groupClass.organization.name | noData:''}}</td>
                                                    <td>{{group.memberCard.card_name}}</td>
                                                    <td>{{group.groupClass.course.name | noData:''}}</td>
                                                    <td>{{group.groupClass.classroom.name | noData:''}}</td>
                                                    <td>{{group.class_date |
                                                        noData:''}}&nbsp{{group.start*1000 | date:'HH:mm' }}
                                                    </td>
                                                    <td ng-if="group.is_print_receipt == 1">已打印</td>
                                                    <td ng-if="group.is_print_receipt == 2">未打印</td>
                                                    <td>{{  group.in_time*1000 | noData: '' | date:'yyyy/MM/dd HH:mm'  }}</td>
                                                    <td><span ng-if=group.status==1>已预约</span>
                                                        <span ng-if=group.status==2>已取消</span>
                                                        <span ng-if=group.status==3>上课中</span>
                                                        <span ng-if=group.status==4>已下课</span>
                                                        <span ng-if=group.status==5>已下课</span>
                                                        <span ng-if=group.status==6>已爽约</span>
                                                        <span ng-if=group.status==7>已爽约</span>
                                                    </td>
                                                    <td>
                                                        <span ng-if="group.about_type == 1">电脑预约</span>
                                                        <span ng-if="group.about_type == 2">APP预约</span>
                                                        <span ng-if="group.about_type == 3">小程序预约</span>
                                                    </td>
                                                    <td>{{group.employee.name | noData:''}}</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                            <?=$this->render('@app/views/common/pagination.php',['page'=>'groupPages']);?>
                                            <?=$this->render('@app/views/common/nodata.php',['name'=>'groupNoDataShow','text'=>'无团课记录','href'=>true]);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-5" class="tab-pane">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>柜子信息列表</h5>
                                    </div>
                                    <div class="ibox-content" style="padding: 0;">
                                        <div style="padding-bottom: 0;height: 300px;overflow: scroll;" id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="position: relative;">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">柜子名称</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">柜号</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">租用日期</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">消费日期</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">金额</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">行为</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 140px;">经办人</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat = 'cabinet in cabinets'>
                                                    <td>{{cabinet.type_name | noData:''}}</td>
                                                    <td>{{cabinet.cabinet_number | noData:''}}</td>
                                                    <td>{{cabinet.start_rent *1000 | noData:''| date:'yyyy/MM/dd'}} - {{cabinet.end_rent *1000 | noData:''| date:'yyyy/MM/dd'}}</td>
                                                    <td ng-if="cabinet.rent_type == '退租金'">{{cabinet.back_rent *1000 | noData:''|
                                                        date:'yyyy/MM/dd'}}</td>
                                                    <td ng-if="cabinet.rent_type != '退租金'">{{cabinet.create_at *1000 | noData:''|
                                                        date:'yyyy/MM/dd'}}
                                                    </td>
                                                    <td>{{cabinet.price | noData:'元'}}</td>
                                                    <td>{{cabinet.rent_type}}</td>
                                                    <td ng-if="cabinet.name != null && cabinet.name != ''">
                                                        {{cabinet.name}}
                                                    </td>
                                                    <td ng-if="cabinet.name == null || cabinet.name == ''">
                                                        暂无数据
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <?=$this->render('@app/views/common/pagination.php',['page'=>'cabinetPages']);?>
                                            <?=$this->render('@app/views/common/nodata.php',['name'=>'cabinetNoDataShow','text'=>'无柜子记录','href'=>true]);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-6" class="tab-pane">
                                <div class="ibox float-e-margins">
                                    <select class="form-control" ng-model="selectState"
                                            ng-change="SelectMessage(selectState)"
                                            style="width: 160px;padding-top: 0;padding-bottom: 0;display: inline-block;">
                                        <option value="">到场离场</option>
                                        <option value="1">赠品记录</option>
                                        <option value="2">行为记录</option>
                                        <option value="3">送人记录</option>
                                        <option value="4">私教课延期</option>
                                        <option value="5">赠送天数</option>
                                        <option value="6">定金信息</option>
                                        <option value="7">会籍记录</option>
                                        <option value="8">转卡记录</option>
                                        <option value="9">私教变更</option>
                                        <option value="10">IC卡绑定</option>
                                        <option value="11">场馆变更记录</option>
                                    </select>
                                    <span ng-show="depositMoneyShow" class="pull-right" style="color: orange;font-size: 16px;font-weight: 700;line-height: 30px;min-width: 100px;margin-left: 20px;">
                                        定金:{{depositAllMoney}} 元
                                    </span>
                                    <select ng-show="depositMoneyShow" class="form-control pull-right" ng-change="depositSelectChange(depositSelect)" ng-model="depositSelect" style="display: inline-block;max-width: 160px;padding: 4px 12px;">
                                        <option value="">请选择缴费定金</option>
                                        <option value="1">购卡定金</option>
                                        <option value="2">购课定金</option>
                                        <option value="3">续费定金</option>
                                        <option value="4">卡升级定金</option>
                                        <option value="5">课升级定金</option>
                                    </select>
                                    <div class="ibox-content" style="padding: 0;">
                                        <div ng-show="selectState == ''" >
                                            <div>
                                                <div class="ibox-title" style="position: relative;">
                                                    <h5>到场、离场记录列表
                                                        <span style="font-weight: normal;font-size: 12px;color: #666;" ng-if="entryTime == ''">共进场次数{{count}}次</span>
                                                        <span style="font-weight: normal;font-size: 12px;color: #666;" ng-if="entryTime != ''">{{entryTime}}共进场次数{{count}}次</span>
                                                        <input type="text" id = 'datetimeStart' class="input-sm form-control" name="start" placeholder="选择日期查看"  style="position:absolute;top: 6px;right: 89px;width: 160px;text-align:left;font-size: 13px;font-weight:normal;cursor: pointer;" ng-model="entryTime" ng-change="searchEntry()">
                                                        <button class="btn btn-info btn-sm"
                                                                style="position: absolute;top: 6px;right: 20px;" ng-click="initBackDateTimeInfo()">清空</button>
                                                    </h5>
                                                </div>
                                                <div class="ibox-content" style="padding: 0">
                                                    <div style="padding-bottom: 0;height: 300px;overflow: scroll;" id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                                        <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="position: relative;">
                                                            <thead>
                                                            <tr role="row">
                                                                <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">场馆</th>
                                                                <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">卡种名称</th>
                                                                <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">进场时间</th>
                                                                <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">离场时间</th>
                                                                <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">总时长</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr ng-repeat='entry in entrys'>
                                                                <td>{{entry.name | noData:''}}
                                                                <td>{{entry.card_name | noData:''}}
                                                                </td>
                                                                <td ng-if="entry.entry_time != 'et' ">{{entry.entry_time *1000 | date:'yyyy/MM/dd HH:mm'}}</td>
                                                                <td ng-if="entry.entry_time == 'et' ">暂无数据</td>
                                                                <td ng-if="entry.leaving_time != 'lt' ">{{entry.leaving_time *1000 | date:'yyyy/MM/dd HH:mm'}}</td>
                                                                <td ng-if="entry.leaving_time == 'lt' ">暂无数据</td>
                                                                <td ng-if="entry.entry_time !='et' && entry.leaving_time !='lt'">{{entry.abc}}小时</td>
                                                                <td ng-if="entry.entry_time =='et' || entry.leaving_time =='lt'">暂无数据</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <?=$this->render('@app/views/common/pagination.php',['page'=>'entryPages']);?>
                                                        <?=$this->render('@app/views/common/nodata.php',['name'=>'entryNoDataShow','text'=>'无进场记录','href'=>true]);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div ng-if="selectState == 1">
                                            <div class="ibox-content" style="padding: 0;">
                                                <div id="DataTables_Table_0_wrapper"
                                                     class="dataTables_wrapper form-inline a26" role="grid">
                                                    <table
                                                        class="table table-striped table-bordered table-hover dataTables-example dataTable"
                                                        id="DataTables_Table_0"
                                                        aria-describedby="DataTables_Table_0_info"
                                                        style="position: relative;">
                                                        <thead>
                                                        <tr role="row">
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">物品名称
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">数量
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">赠送日期
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">领取日期
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">操作
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr ng-repeat="x in giftList">
                                                            <td>{{x.name|noData:''}}</td>
                                                            <td>
                                                                <span ng-if="x.num != '-1' && x.num != -1">{{x.num}}</span>
                                                                <span ng-if="x.num == '-1' || x.num == -1">不限</span>
                                                            </td>
                                                            <td>
                                                                <span ng-if="x.create_at != null && x.create_at != ''">{{x.create_at*1000|date:'yyyy-MM-dd HH:mm:ss'}}</span>
                                                                <span ng-if="x.create_at == null && x.create_at == ''">暂无数据</span>
                                                            </td>
                                                            <td>
                                                                <span ng-if="x.get_day != null && x.get_day != ''">{{x.get_day*1000|date:'yyyy-MM-dd HH:mm:ss'}}</span>
                                                                <span ng-if="x.get_day == null && x.get_day == ''">暂无数据</span>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-success w100 btn-sm" ng-click="receiveGift(x.id)" ng-if="x.status == 1">领取</button>
                                                                <span ng-if="x.status ==2">已领取</span>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <?= $this->render('@app/views/common/pagination.php', ['page' => 'giftPages']); ?>
                                                    <?= $this->render('@app/views/common/nodata.php', ['name' => 'giftNoDataShow', 'text' => '无赠品记录', 'href' => true]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div ng-if="selectState == 2" class="ng-scope">
                                            <div class="ibox-content" style="padding: 0;">
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline a26" role="grid">
                                                    <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="position: relative;">
                                                        <thead>
                                                        <tr role="row">
                                                            <th class=" a28" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序">行为
                                                            </th>
                                                            <th class=" a28" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序">时间
                                                            </th>
                                                            <th class=" a28" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序">备注
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <!-- ngRepeat: behaviorRecord in  behaviorRecordLists -->
                                                        </tbody>
                                                    </table>
                                                    <!--暂无数据-->
                                                    <div style="margin: 4% auto 0 auto;text-align: center;font-size: 22px;color: #888;" ng-show="behaviorRecordFlag" class="">
                                                        <img src="/plugins/noData/img/noDate.png">
                                                        <p style="margin-top:3%;">暂无数据</p>
                                                    </div>
                                                    <!--搜索没有结果-->
                                                    <div style="margin: 4% auto 0 auto;text-align: center;font-size: 22px;color: #888;" ng-show="searchData" class="ng-hide">
                                                        <img src="/plugins/noData/img/noSearch.png">
                                                        <p style="margin-top:3%;">暂无数据</p>
                                                        <a href="/site/index?mid=25&amp;c=24"><button class="btn btn-primary">&nbsp;&nbsp;返回主页&nbsp;&nbsp;</button></a>
                                                    </div>
                                                    <!--网络未连接-->
                                                    <div style="margin: 4% auto 0 auto;text-align: center;font-size: 22px;color: #888;" ng-show="noNetWork" class="ng-hide">
                                                        <img src="/plugins/noData/img/noNetwork.png">
                                                        <p style="margin-top:3%;">检查不到网络了</p>
                                                        <a href="/site/index?mid=25&amp;c=24"><button class="btn btn-primary">&nbsp;&nbsp;返回主页&nbsp;&nbsp;</button></a>
                                                    </div>                                                    <nav class="text-center" compileval="behaviorRecordPages" compileview=""></nav>                                                </div>
                                            </div>
                                        </div>
                                        <div ng-if="selectState == 3">
                                            <div class="ibox-content"
                                                 style="padding: 0;">
                                                <div id="DataTables_Table_0_wrapper"
                                                     class="dataTables_wrapper form-inline a26"
                                                     role="grid">
                                                    <table
                                                        class="table table-striped table-bordered table-hover dataTables-example dataTable"
                                                        id="DataTables_Table_0"
                                                        aria-describedby="DataTables_Table_0_info"
                                                        style="position: relative;">
                                                        <thead>
                                                        <tr role="row">
                                                            <th class=" a28"
                                                                tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1"
                                                                colspan="1" a
                                                                ria-label="浏览器：激活排序列升序">卡名称
                                                            </th>
                                                            <th class=" a28"
                                                                tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1"
                                                                colspan="1"
                                                                aria-label="浏览器：激活排序列升序">卡号
                                                            </th>
                                                            <th class=" a28"
                                                                tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1"
                                                                colspan="1"
                                                                aria-label="浏览器：激活排序列升序">被赠送人
                                                            </th>
                                                            <th class=" a28"
                                                                tabindex="0"
                                                                aria-controls="DataTables_Table_0"
                                                                rowspan="1"
                                                                colspan="1"
                                                                aria-label="浏览器：激活排序列升序">赠送时间
                                                            </th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr ng-repeat="xx in  memberSendCardList">
                                                            <td>{{xx.card_name}}</td>
                                                            <td>{{xx.card_number}}</td>
                                                            <td>{{xx.name}}</td>
                                                            <td>{{xx.send_time*1000 |date:'yyyy-MM-dd'}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <?=$this->render('@app/views/common/nodata.php',['name'=>'payNoSendCardRecordDataShow','text'=>'暂无送人记录','href'=>true]);?>
                                                </div>
                                            </div>
                                        </div>
                                        <div ng-if="selectState == 4">
                                            <div class="ibox-content" style="padding: 0;height: 400px;overflow-y: auto;">
                                                <div id="DataTables_Table_0_wrapper"
                                                     class="dataTables_wrapper form-inline a26" role="grid">
                                                    <table
                                                        class="table table-striped table-bordered table-hover dataTables-example dataTable"
                                                        id="DataTables_Table_0"
                                                        aria-describedby="DataTables_Table_0_info"
                                                        style="position: relative;">
                                                        <thead>
                                                        <tr role="row">
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">课程名称
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">数量
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">延期天数
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">到期日期
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">备注
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">操作人
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr ng-repeat="d in delayPrivateRecordList">
                                                            <td>{{d.course_name|noData:''}}</td>
                                                            <td>{{d.course_num|noData:''}}</td>
                                                            <td>{{d.postpone_day|noData:''}}</td>
                                                            <td>
                                                                <span ng-if="d.due_day == null">暂无数据</span>
                                                                <span ng-if="d.due_day != null">{{d.due_day*1000|date:'yyyy-MM-dd'}}</span>
                                                            </td>
                                                            <td>{{d.remark|noData:''}}</td>
                                                            <td>{{d.employee.name|noData:''}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <?= $this->render('@app/views/common/nodata.php', ['name' => 'priDelayNoDataShow', 'text' => '无延期记录', 'href' => true]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div ng-if="selectState == 5">
                                            <div class="ibox-content" style="padding: 0;height: 400px;overflow-y: auto;">
                                                <div id="DataTables_Table_0_wrapper"
                                                     class="dataTables_wrapper form-inline a26" role="grid">
                                                    <table
                                                        class="table table-striped table-bordered table-hover dataTables-example dataTable"
                                                        id="DataTables_Table_0"
                                                        aria-describedby="DataTables_Table_0_info"
                                                        style="position: relative;">
                                                        <thead>
                                                        <tr role="row">
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">卡名
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">赠送类型
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">赠送天数
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">赠送时间
                                                            </th>
                                                            <th class="a28" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label="浏览器：激活排序列升序">备注
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr ng-repeat="gifts in giftDaysInfoRecondData">
                                                            <td>{{gifts.card_name | noData:''}}</td>
                                                            <td>
                                                                <span ng-if="gifts.type == '1'">新办卡的赠送</span>
                                                                <span ng-if="gifts.type == '2'">其他赠送</span>
                                                            </td>
                                                            <td>{{gifts.num | noData:''}}</td>
                                                            <td>
                                                                <span ng-if="gifts.create_at != null">{{gifts.create_at*1000 | date:'yyyy-MM-dd'}}</span>
                                                                <span ng-if="gifts.create_at == null">暂无数据</span>
                                                            </td>
                                                            <td>{{gifts.note | noData:''}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <?= $this->render('@app/views/common/nodata.php', ['name' => 'giftNoDataInfoHaShow', 'text' => '无赠送记录', 'href' => true]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div ng-if="selectState == 6">
                                            <div class="ibox-content" style="padding: 0;min-height: 200px;overflow: auto;">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr role="row">
                                                            <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序">定金类型</th>
                                                            <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序">金额</th>
                                                            <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序">有效期</th>
                                                            <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序">付款方式</th>
                                                            <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序">缴定金日期</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="zzz in getDepositInfoData">
                                                            <td ng-if="zzz.type == '1' || zzz.type == 1">购卡定金</td>
                                                            <td ng-if="zzz.type == '2' || zzz.type == 2">购课定金</td>
                                                            <td ng-if="zzz.type == '3' || zzz.type == 3">续费定金</td>
                                                            <td ng-if="zzz.type == '4' || zzz.type == 4">卡升级定金</td>
                                                            <td ng-if="zzz.type == '5' || zzz.type == 5">课升级定金</td>
                                                            <td ng-if="zzz.type == undefined || zzz.type == null || zzz.type == ''">暂无数据</td>
                                                            <td>{{zzz.price | number:'2' | noData:''}}</td>
                                                            <td>{{zzz.start_time*1000 | date:'yyyy-MM-dd'}}&nbsp;-&nbsp;{{zzz.end_time*1000 | date:'yyyy-MM-dd'}}</td>
                                                            <td ng-if="zzz.pay_mode == '1' || zzz.pay_mode == 1">现金</td>
                                                            <td ng-if="zzz.pay_mode == '2' || zzz.pay_mode == 2">支付宝</td>
                                                            <td ng-if="zzz.pay_mode == '3' || zzz.pay_mode == 3">微信</td>
                                                            <td ng-if="zzz.pay_mode == '4' || zzz.pay_mode == 4">pos刷卡</td>
                                                            <td ng-if="zzz.pay_mode == '5' || zzz.pay_mode == 5">建设分期</td>
                                                            <td ng-if="zzz.pay_mode == '6' || zzz.pay_mode == 6">广发分期</td>
                                                            <td ng-if="zzz.pay_mode == '7' || zzz.pay_mode == 7">招行分期</td>
                                                            <td ng-if="zzz.pay_mode == '8' || zzz.pay_mode == 8">借记卡</td>
                                                            <td ng-if="zzz.pay_mode == '9' || zzz.pay_mode == 9">贷记卡</td>
                                                            <td>{{zzz.pay_money_time*1000 | date:'yyyy-MM-dd'}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <?= $this->render('@app/views/common/nodata.php', ['name' => 'depositNoDataShow', 'text' => '暂无定金记录']); ?>
                                            </div>
                                        </div>
                                        <div ng-if="selectState == 7">
                                            <div class="ibox-content" style="padding: 0;min-height: 200px;overflow: auto;">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr role="row">
                                                        <th rowspan="1" colspan="1">会籍姓名</th>
                                                        <th rowspan="1" colspan="1">创建时间</th>
                                                        <th rowspan="1" colspan="1">行为</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr ng-repeat="CCRecord in consultantChangeRecord">
                                                        <td>{{ CCRecord.name }}</td>
                                                        <td>{{ CCRecord.created_at*1000 | date:'yyyy-MM-dd' }}</td>
                                                        <td ng-if="CCRecord.behavior == 1">入馆</td>
                                                        <td ng-if="CCRecord.behavior == 2">办卡</td>
                                                        <td ng-if="CCRecord.behavior == 3">修改</td>
                                                        <td ng-if="CCRecord.behavior == 4">续费</td>
                                                        <td ng-if="CCRecord.behavior == 5">升级</td>
                                                        <td ng-if="CCRecord.behavior == null || CCRecord.behavior == undefined || CCRecord.behavior == ''">暂无数据</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <?= $this->render('@app/views/common/pagination.php',['page'=>'consultantChangePage']); ?>
                                                <?= $this->render('@app/views/common/nodata.php', ['name' => 'consultantChangeRecordNoData', 'text' => '无会籍变更记录', 'href' => true]); ?>
                                            </div>
                                        </div>
                                        <div ng-if="selectState == 8">
                                            <div class="ibox-content" style="padding: 0;min-height: 200px;overflow: auto;">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="a28" rowspan="1" colspan="1">转出方</th>
                                                        <th class="a28" rowspan="1" colspan="1">转入方</th>
                                                        <th class="a28" rowspan="1" colspan="1">转卡卡号</th>
                                                        <th class="a28" rowspan="1" colspan="1">转卡费用</th>
                                                        <th class="a28" rowspan="1" colspan="1">操作时间</th>
                                                        <th class="a28" rowspan="1" colspan="1">操作人</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr ng-repeat="turnCardRecord in turnCardRecordList">
                                                        <td>{{turnCardRecord.fromName + ' ' + turnCardRecord.fromMobile}}</td>
                                                        <td>{{turnCardRecord.toName + ' ' + turnCardRecord.toMobile}}</td>
                                                        <td>{{turnCardRecord.card_number}}</td>
                                                        <td>{{turnCardRecord.transfer_price + '元'}}</td>
                                                        <td>{{turnCardRecord.transfer_time*1000 | date:'yyyy-MM-dd'}}</td>
                                                        <td ng-if="turnCardRecord.name == undefined || turnCardRecord.name == '' || turnCardRecord.name == null">暂无数据</td>
                                                        <td ng-if="turnCardRecord.name !='' && turnCardRecord.name != undefined && turnCardRecord.name != null">{{turnCardRecord.name}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <?= $this->render('@app/views/common/nodata.php', ['name' => 'noTransferData', 'text' => '无转卡记录', 'href' => true]); ?>
                                            </div>
                                        </div>
                                        <div ng-if="selectState == 9">
                                            <div class="ibox-content" style="padding: 0;min-height: 200px;overflow: auto;">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="a28" rowspan="1" colspan="1">私教姓名</th>
                                                        <th class="a28" rowspan="1" colspan="1">创建时间</th>
                                                        <th class="a28" rowspan="1" colspan="1">行为</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr ng-repeat="PTCRecord in privateTeachChangeRecord">
                                                        <td>{{ PTCRecord.name }}</td>
                                                        <td>{{ PTCRecord.created_at*1000 | date:'yyyy-MM-dd' }}</td>
                                                        <td ng-if="PTCRecord.behavior == 1">入馆</td>
                                                        <td ng-if="PTCRecord.behavior == 2">办卡</td>
                                                        <td ng-if="PTCRecord.behavior == 3">修改</td>
                                                        <td ng-if="PTCRecord.behavior == 4">续费</td>
                                                        <td ng-if="PTCRecord.behavior == 5">升级</td>
                                                        <td ng-if="PTCRecord.behavior == null || PTCRecord.behavior == undefined || PTCRecord.behavior == ''">暂无数据</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <?= $this->render('@app/views/common/pagination.php',['page'=>'privateChangePage']); ?>
                                                <?= $this->render('@app/views/common/nodata.php', ['name' => 'privateChangeRecordNoData', 'text' => '无私教变更记录', 'href' => true]); ?>
                                            </div>
                                        </div>
                                        <div ng-if="selectState == 11">
                                            <div class="ibox-content" style="padding: 0;min-height: 200px;overflow: auto;">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="a28" rowspan="1" colspan="1">旧所属场馆</th>
                                                        <th class="a28" rowspan="1" colspan="1">新所属场馆</th>
                                                        <th class="a28" rowspan="1" colspan="1">创建时间</th>
                                                        <th class="a28" rowspan="1" colspan="1">创建人</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr ng-repeat="changeVenue in memberChangeVenueList">
                                                        <td>{{ changeVenue.oldVenue | noData:'' }}</td>
                                                        <td>{{ changeVenue.newVenue | noData:'' }}</td>
                                                        <td>{{ changeVenue.create_date | noData:'' }}</td>
                                                        <td>{{ changeVenue.employeeName | noData:'' }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <?= $this->render('@app/views/common/nodata.php', ['name' => 'memberChangeVenueShow',  'href' => true]); ?>
                                            </div>
                                        </div>
                                        <div ng-if="selectState == 10">
                                            <div class="ibox-content" style="padding: 0;min-height: 200px;overflow: auto;">
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline a26" role="grid">
                                                    <table class="table table-striped table-bordered table-hover dataTable">
                                                        <thead>
                                                        <tr role="row">
                                                            <th class="a28" rowspan="1" colspan="1">IC卡号</th>
                                                            <th class="a28" rowspan="1" colspan="1">绑定时间</th>
                                                            <th class="a28" rowspan="1" colspan="1">解绑时间</th>
                                                            <th class="a28" rowspan="1" colspan="1">状态</th>
                                                            <th class="a28" rowspan="1" colspan="1">操作人</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr ng-repeat="i in icCardListInfo">
                                                            <td>{{i.custom_ic_number | noData:''}}</td>
                                                            <td>
                                                                <span ng-if="i.create_at != null && i.create_at != ''">{{i.create_at * 1000 | date:'yyyy-MM-dd'}}</span>
                                                                <span ng-if="i.create_at == null || i.create_at == ''">暂无数据</span>
                                                            </td>
                                                            <td>
                                                                <span ng-if="i.unbundling != null && i.unbundling != '' && i.unbundling != '0'">{{i.unbundling * 1000 | date:'yyyy-MM-dd'}}</span>
                                                                <span ng-if="i.unbundling == null || i.unbundling == '' || i.unbundling == '0'">暂无数据</span>
                                                            </td>
                                                            <td>
                                                                <span ng-if="i.status == '1'">已绑定</span>
                                                                <span ng-if="i.status == '2'">已解绑</span>
                                                            </td>
                                                            <td>{{i.name | noData:''}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <?= $this->render('@app/views/common/pagination.php',['page'=>'icCardPage']); ?>
                                                    <?= $this->render('@app/views/common/nodata.php', ['name' => 'icCardNoData', 'text' => '无IC卡绑定记录', 'href' => true]); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-7" class="tab-pane">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>请假列表</h5>
                                    </div>
                                    <div class="ibox-content" style="padding: 0">
                                        <div style="padding-bottom: 0;height: 300px;overflow: scroll;" id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="position: relative;">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">卡名称</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">登记时间</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">请假时间</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">销假时间</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">请假时长</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">请假事由</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">请假类型</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">经办人</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">请假途径</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">销假</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat = 'vacate in vacates'>
                                                    <td>{{vacate.card_name | noData:''}}</td>
                                                    <td>{{vacate.create_at *1000 | noData:''| date:'yyyy/MM/dd'}}</td>
                                                    <td>{{vacate.leave_start_time *1000 | noData:''| date:'yyyy/MM/dd'}}</td>
                                                    <td>{{vacate.terminate_time *1000 | noData:''| date:'yyyy/MM/dd'}}</td>
                                                    <td>{{vacate.leave_length | noData:'天'}}</td>
                                                    <td title="{{ vacate.note }}">{{vacate.note |cut:true:4:'...' | noData:''}}</td>
                                                    <td>
                                                        <span ng-if="vacate.leave_type == '1'">正常请假</span>
                                                        <span ng-if="vacate.leave_type == '2'">特殊请假</span>
                                                        <span ng-if="vacate.leave_type == '3'">学生请假</span>
                                                        <span ng-if="vacate.leave_type != '1' && vacate.leave_type != '2' && vacate.leave_type != '3'">暂无数据</span>
                                                    </td>
                                                    <td>
                                                        <span ng-show="vacate.source == 0 || vacate.source == 1">{{ vacate.employeeName == null ? '暂无数据' : vacate.employeeName }}</span>
                                                        <span ng-show="vacate.source == 2 || vacate.source == 3 || vacate.source == 4 ">{{ MemberData.name | noData:'' }}</span>
                                                    </td>
                                                    <td>
                                                        <span ng-if="vacate.source == 1 || vacate.source == 0">电脑</span>
                                                        <span ng-if="vacate.source == 2">小程序</span>
                                                        <span ng-if="vacate.source == 3">公众号</span>
                                                        <span ng-if="vacate.source == 4">APP</span>
                                                    </td>
<!--                                                        <div class="btn btn-sm btn-default" -->
<!--                                                             ng-click="removeLeave(vacate.id,vacate.status)">-->
<!--                                                            {{vacate.status == 1 ?"销假":"已销假"}}-->
<!--                                                        </div>-->
                                                    <td>
                                                        <div ng-if="vacate.status == 1" class="btn btn-sm btn-default"
                                                            <?php if (\backend\models\AuthRole::canRoleByAuth('checkCard', 'XIAOJIA')) { ?>
                                                                ng-click="removeLeave(vacate.id,vacate.status)"
                                                            <?php } ?>
                                                            <?php if (!\backend\models\AuthRole::canRoleByAuth('checkCard', 'XIAOJIA')) { ?>
                                                                disabled
                                                            <?php } ?>
                                                        >
                                                            销假
                                                        </div>
                                                        <div ng-if="vacate.status == 2" class="btn btn-sm btn-default">
                                                            已销假
                                                        </div>
                                                        <div ng-if="vacate.status == 4" class="btn btn-sm btn-default">
                                                            已登记
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <?=$this->render('@app/views/common/pagination.php',['page'=>'leavePages']);?>
                                            <?=$this->render('@app/views/common/nodata.php',['name'=>'leaveNoDataShow','text'=>'无请假记录','href'=>true]);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--预约场地记录-->
                            <div id="tab-8" class="tab-pane">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>场地记录列表</h5>
                                    </div>
                                    <div class="ibox-content" style="padding: 0;overflow-y: scroll;min-height:450px;max-height: 450px;">
                                        <p ng-if="isLoading" style="font-size: 20px;text-align: center;line-height: 450px">加载中...</p>
                                        <div ng-if="!isLoading" id="DataTables_Table_0_wrapper"
                                             class="dataTables_wrapper form-inline a26"
                                             role="grid">
                                            <table
                                                class="table table-striped table-bordered table-hover dataTables-example dataTable"
                                                id="DataTables_Table_0"
                                                aria-describedby="DataTables_Table_0_info"
                                                style="position: relative;">
                                                <thead>
                                                <tr role="row">
                                                    <th class="bgw"
                                                        tabindex="0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="浏览器：激活排序列升序"
                                                        style="width: 100px;">
                                                        场地名称
                                                    </th>
                                                    <th class="bgw"
                                                        tabindex="0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="浏览器：激活排序列升序"
                                                        style="width: 100px;">
                                                        卡名称
                                                    </th>
                                                    <th class="bgw"
                                                        tabindex="0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="浏览器：激活排序列升序"
                                                        style="width: 100px;">
                                                        预约时间
                                                    </th>
                                                    <th class="bgw"
                                                        tabindex="0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="浏览器：激活排序列升序"
                                                        style="width: 100px;">
                                                        预约区间
                                                    </th>
                                                    <th class="bgw"
                                                        tabindex="0"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="浏览器：激活排序列升序"
                                                        style="width: 100px;">
                                                        操作
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="info in yardRecordData">
                                                    <td title="{{info.name}} - {{info.vName}}">{{info.name}} - {{info.vName}}</td>
                                                    <td>{{info.card_name}}</td>
                                                    <td>
                                                        <span>{{info.create_at*1000 | date:"yyyy-MM-dd HH:mm"}}</span>
                                                    </td>
                                                    <td>{{(info.about_start*1000) | date:"yyyy-MM-dd HH:mm"}} - {{(info.about_end*1000) | date:"yyyy-MM-dd HH:mm"}}</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm hoverBtn tdBtn ng-scope" ng-if="info.status == 1 || info.status == 2" ng-click="cancelReservationYard(info)">取消场地预约
                                                        </button>
                                                        <button class="btn btn-error btn-sm hoverBtn tdBtn ng-scope" ng-if="info.status == 5" ng-disabled="info.status == 5">已取消场地
                                                        </button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <?= $this->render('@app/views/common/nodata.php', ['name' => 'memberYardDataList', 'text' => '暂无场地记录', 'href' => true]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-13" class="tab-pane">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>消费记录列表</h5>
                                    </div>
                                    <div class="ibox-content" style="padding: 0">
                                        <div style="padding-bottom: 0;height: 300px;overflow: scroll;" id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="position: relative;">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting" ng-click="recordsOfConsumption('member_consumptionDate',sort)" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">消费时间</th>
                                                    <th class="sorting" ng-click="recordsOfConsumption('member_consumptionAmount',sort)" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">消费金额/次数</th>
                                                    <th class="sorting" ng-click="recordsOfConsumption('member_consumptionType',sort)" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">业务行为</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">备注</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat = 'expense in expenses'>
                                                    <td>{{expense.consumption_date *1000 | noData:''| date:'yyyy/MM/dd HH:mm'}}</td>
                                                    <td><span ng-if=expense.type==1>{{expense.consumption_amount | noData:'元'}}</span>
                                                        <span ng-if=expense.type==2>{{expense.consumption_times | noData:'次'}}</span>
                                                        <span ng-if=expense.type==3>{{expense.consumption_amount | noData:'元'}}</span>

                                                    </td>
                                                    <td>{{expense.category}}</td>
                                                    <td title="{{expense.remarks|noData:''}}">
                                                        <span ng-if="expense.remarks != null && expense.remarks != ''">{{expense.remarks | cut:true:15:'...'}}</span>
                                                        <span ng-if="expense.remarks == null || expense.remarks == ''">无</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
<!--                                            <?//=$this->render('@app/views/common/pagination.php',['page'=>'payPages']);?> -->
                                            <?=$this->render('@app/views/common/nodata.php',['name'=>'payNoDataShow','text'=>'无消费记录','href'=>true]);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-10" class="tab-pane">
                                <div class="ibox chat-view">
                                    <div class="ibox-title">
                                        <h5>跟进维护消息记录</h5>
                                    </div>
                                    <div class="ibox-content" style="padding: 0">
                                        <div class="chat-discussion" style="height: 320px;overflow: scroll;position: relative;">
                                            <div class="chat-message">
                                                <img class="message-avatar" src="/plugins/user/images/dong.jpg">
                                                <div class="message">
                                                    销售部:
                                                    <a href="#" class="message-author" style="color: #69e">董成鹏</a>
                                                    <span class="message-date"> 2015-02-02 18:39:23 </span>
                                                    <span class="message-content">用户下次来时成交</span>
                                                </div>
                                            </div>
                                            <div class="chat-message">
                                                <img class="message-avatar" src="/plugins/user/images/dong.jpg">
                                                <div class="message">
                                                    销售部:
                                                    <a href="#" class="message-author" style="color: #69e">董成鹏</a>
                                                    <span class="message-date"> 2015-02-02 18:39:23 </span>
                                                    <span class="message-content">用户又不想办这个卡了！！！</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-message-from col-sm-12 pd0" style="margin-top: 20px;">
                                            <div class="form-group col-sm-10 pd0">
                                                                    <textarea name="message" style="resize: none;"
                                                                              class="form-control" placeholder="请输入消息内容"></textarea>
                                            </div>
                                            <div class="col-sm-2 pd0">
                                                <button class="btn btn-success pull-right" style="margin-top: 6px;height: 40px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发送&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-11" class="tab-pane">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>消费记录列表</h5>
                                    </div>
                                    <div class="ibox-content" style="padding: 0">
                                        <div style="padding-bottom: 0;height: 300px;overflow: scroll;" id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="position: relative;">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">客户名称</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">项目</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">金额</th>
                                                    <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">时间</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>董成鹏</td>
                                                    <td>办卡</td>
                                                    <td>20000元</td>
                                                    <td>2016-1-1&nbsp;19:00</td>
                                                </tr>
                                                <tr>
                                                    <td>董成鹏</td>
                                                    <td>进馆</td>
                                                    <td>无</td>
                                                    <td>2016-1-1&nbsp;19:00</td>
                                                </tr>
                                                <tr>
                                                    <td>董成鹏</td>
                                                    <td>私教课办理</td>
                                                    <td>500元</td>
                                                    <td>2016-1-1&nbsp;19:00</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 20px;" class="modal fade" id="myCardModals12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 20%;top: 120px;">
            <div style="padding-bottom: 20px;" class="modal-content clearfix">
                <div style="border: none;" class="modal-header">
                    <button type="button" class="close" ng-click="myCardClose()" >
                        &times;
                    </button>
                    <h3 class="text-info" style="font-size: 24px;text-align: left;margin-top: 20px;margin-left: 10px;font-weight: normal;">互换卡号信息</h3>
                    <div class="col-sm-12 pd0" style="margin-top: 10px;height: 2px;background: #e1e1e1;"></div>
                    <form style="padding-left: 10px;padding-right: 10px;">
                        <div class="col-sm-12 pd0">
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputName2" style="font-size: 16px;font-weight: normal;color: #333;">卡号1:</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputName2"
                                       ng-model="numberOne"
                                       placeholder="请输入卡号">
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputName2" style="font-size: 16px;font-weight: normal;color: #333;">卡号2:</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputName2"
                                       ng-model="numberTwo"
                                       placeholder="请输入卡号">
                            </div>
                        </div>
                    </form>
                    <button class="btn btn-success center-block" style="margin-top: 20px;" ng-click="exchangeNumber()">&nbsp;&nbsp;&nbsp;&nbsp;交换&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <div style="margin-top: 20px;" class="modal fade" id="myModals6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div style="padding-bottom: 20px;margin-top: 200px;" class="modal-content clearfix">
                <div style="border: none;" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>

                    <h5 style="margin-left:10px;text-align: center;font-size: 20px;">会员卡信息修改</h5>
                    <form>
                        <div style="margin-top: 10px;" class="form-group">
                            <label style="font-size: 14px;" for="exampleInputName3">卡名称:</label>
                            <input  id="_csrf" type="hidden"
                                    name="<?= \Yii::$app->request->csrfParam; ?>"
                                    value="<?= \Yii::$app->request->getCsrfToken(); ?>">
                            <input type="hidden" value="{{cardDetail.id}}" id="memCardId">
                            <input type="hidden" value="{{cardDetail.member_id}}" id="memberId" >
                            <span>{{cardDetail.card_name}}</span>
                        </div>
                        <div style="margin-top: 10px;" class="form-group">
                            <!--                                <input type="text" class="form-control"  id="exampleInputName6" ng-model="cardDetail.invalid_time" placeholder="请输入有效期">-->
                            <label style="font-size: 14px;position: relative;top: 13px;left: -196px" for="exampleInputName6">失效日期</label>
                            <div style="float: left;position: relative;" class="input-daterange input-group cp" id="container">
                                <b><input type="text" id="datetimeEnd" class="form-control" name="" placeholder="结束日期" style="left:112px;top: 7px;"></b>
                            </div>
                        </div>
                        <div style="margin-top: 10px;" class="form-group">
                            <!--                                ng-model="cardDetail.employeeName"-->
                            <label style="font-size: 14px;position: relative;left: -310px;top: 12px;" for="">销售顾问</label>
                            <select class="form-control fl" style="padding: 0 0 0 4px;width: 201px;margin-left: 111px;margin-top: 9px" id="coachId" ng-model="adviser">
                                <option value="">请选择</option>
                                <option value="{{theAdviser.id}}" ng-repeat="theAdviser in allAdviser">{{theAdviser.name}}</option>
                            </select>
                        </div>
                    </form>
                    <button style="margin-top: 20px;" type="submit" class="btn btn-primary backBtn" ng-click="back()">&nbsp&nbsp&nbsp&nbsp返回&nbsp&nbsp&nbsp&nbsp</button>
                    <button style="margin-top: 20px;"  ng-click="refer()"   type="submit" class="btn btn-success pull-right successBtn">&nbsp&nbsp&nbsp&nbsp完成&nbsp&nbsp&nbsp&nbsp</button>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 20px;" class="modal fade" id="myModals9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;">
            <div style="padding-bottom: 20px;margin-top: 200px;" class="modal-content clearfix">
                <div style="border: none;" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3 style="font-size: 24px;text-align: center;margin-top: 20px;">私教上课情况信息</h3>
                    <div class="ibox float-e-margins" style="margin-top: 20px;">
                        <div class="ibox-title">
                            <h5>课程记录列表</h5>
                        </div>
                        <div class="ibox-content" style="padding: 0">
                            <div style="padding-bottom: 0;height: 300px;overflow: scroll;" id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="position: relative;">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">上课时间</th>
                                        <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">总节数</th>
                                        <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">上课时长</th>
                                        <th class="sorting"tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 100px;">上课教练</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat = 'record in records'>
                                        <td >{{record.start *1000 | noData:''| date:'yyyy/MM/dd  HH:mm'}}</td>
                                        <td>{{record.course_amount| noData:''}}</td>
                                        <td>{{(record.end-record.start)/60 | noData:''}}</td>
                                        <td>{{record.name | noData:''}}</td>
                                    </tr>
                                    <!--                                        <tr>-->
                                    <!--                                            <td>2015-12-1&nbsp;19:00</td>-->
                                    <!--                                            <td>11/20</td>-->
                                    <!--                                            <td>60分钟</td>-->
                                    <!--                                            <td>白百合</td>-->
                                    <!--                                        </tr>-->
                                    <!--                                        <tr>-->
                                    <!--                                            <td>2015-11-1&nbsp;19:00</td>-->
                                    <!--                                            <td>12/20</td>-->
                                    <!--                                            <td>60分钟</td>-->
                                    <!--                                            <td>白百合</td>-->
                                    <!--                                        </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
