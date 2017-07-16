<?php
  echo (
    '
<div class="portlet-body form">
    <form role="form">
        <div class="form-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-9">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Virtual Restaurants</label>
                                <div class="col-md-8">
                                  <select class="select2-vrs" multiple="multiple" name="virtualRestaurants" style="width: 100%;">
                                    <option value="1" selected>	The Roma Takeaway (Clondalkin)[5]</option>
                                    <option value="2" selected>Luigis Longford[7]</option>
                                    <option value="3">Thai Garden Barnet[10]</option>
                                    <option value="4">Shakira Indian (Dun Laoghaire)[35]</option>
                                  </select>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Minimum Order Amount</label>
                            <input id="MinimumOrderAmount" type="text" class="form-control" value="0.00">
                            <br>
                            <label class="control-label">Area Id</label>
                            <input id="AreaId" type="text" class="form-control">
                        </div>
                    </div>
                    <br><br>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="checkbox-list">
                                    <label class="checkboxoption1">
                                                <div class="checker" id="uniform-IsEnabled"><span class="checked"><input type="checkbox" id="IsEnabled" value="option1" checked=""></span></div> Is Enabled
                                            </label>
                                    <label class="checkboxoption1">
                                                <div class="checker" id="uniform-IsReusable"><span class="checked"><input type="checkbox" id="IsReusable" value="option1" checked=""></span></div> Is Reusable
                                            </label>
                                    <label class="checkboxoption1">
                                                <div class="checker" id="uniform-IsUsedUp"><span><input type="checkbox" id="IsUsedUp" value="option1"></span></div> Is Used Up
                                            </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <div class="checkbox-list">
                                    <label class="checkboxoption1">
                                                <div class="checker" id="uniform-IsValidForPickupOrders"><span class="checked"><input type="checkbox" id="IsValidForPickupOrders" value="option1" checked=""></span></div> Is Valid For Pickup Orders
                                            </label>
                                    <label class="checkboxoption1">
                                                <div class="checker" id="uniform-IsValidForDeliveryOrders"><span class="checked"><input type="checkbox" id="IsValidForDeliveryOrders" value="option1" checked=""></span></div> Is Valid For Delivery Orders
                                            </label>
                                    <label class="checkboxoption1">
                                                <div class="checker" id="uniform-IsValidForCardOrders"><span class="checked"><input type="checkbox" id="IsValidForCardOrders" value="option1" checked=""></span></div> Is Valid For Card Orders
                                            </label>
                                    <label class="checkboxoption1">
                                                <div class="checker" id="uniform-IsValidForCashOrders"><span><input type="checkbox" id="IsValidForCashOrders" value="option1"></span></div> Is Valid For Cash Orders
                                            </label>
                                    <label class="checkboxoption1">
                                                <div class="checker" id="uniform-IsValidForFirstOrderOnly"><span><input type="checkbox" id="IsValidForFirstOrderOnly" value="option1"></span></div> Is Valid For First Order Only
                                            </label>
                                    <label class="checkboxoption1">
                                                <div class="checker" id="uniform-IsValidOncePerCustomer"><span><input type="checkbox" id="IsValidOncePerCustomer" value="option1"></span></div> Is Valid Once Per Customer
                                            </label>
                                    <label class="checkboxoption1">
                                                <div class="checker" id="uniform-AutoApply"><span><input type="checkbox" id="AutoApply" value="option1"></span></div> Auto Apply
                                            </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-body">
            <button id="createVoucherConfig" type="button" class="btn green" style="float:right;">Submit</button>
        </div>
    </form>
</div>
'
  )
?>