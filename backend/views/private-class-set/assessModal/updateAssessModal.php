<!--
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/29 0029
 * Time: 15:08
 */
-->
<!--修改体能评估添加子级模态框-->
<div class="modal fade" tabindex="-1" role="dialog" id="updateAssessModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">修改分类</h4>
            </div>
            <div class="modal-body pd50">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 pd0">
                        <div class="col-lg-2 text-right pd0 lH30">
                            <span class="red">*</span>名称
                        </div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" ng-model="updateAssessName" placeholder="请输入名称，最多6个字">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default w100" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-success w100" ng-click="updateAssessParentBtn()">完成</button>
            </div>
        </div>
    </div>
</div>
