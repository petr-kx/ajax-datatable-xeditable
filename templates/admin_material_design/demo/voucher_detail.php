<?php
  echo (
    '
<div class="portlet-body form">
    <form role="form" action="demo/table_ajax.php" method="post">
        <div class="form-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-9">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Virtual Restaurants</label>
                                <div class="col-md-8">
                                  <select class="select2-vrs" multiple="multiple" name="virtualRestaurants" style="width: 100%;">
                                    <option value="5" selected>	The Roma Takeaway (Clondalkin)[5]</option>
                                    <option value="7" selected>Luigis Longford[7]</option>
                                    <option value="10">Thai Garden Barnet[10]</option>
                                    <option value="35">Shakira Indian (Dun Laoghaire)[35]</option>
                                  </select>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Minimum Order Amount</label>
                            <input type="text" class="form-control MinimumOrderAmount" value="0.00">
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
                                                <input type="checkbox" class="IsEnabled" value="option1" checked="">Is Enabled
                                            </label>
                                    <label class="checkboxoption1">
                                        <input type="checkbox" class="IsReusable" value="option1"> Is Reusable
                                    </label>
                                    <label class="checkboxoption1">
                                                <input type="checkbox" class="IsUsedUp" value="option1">Is Used Up
                                            </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <div class="checkbox-list">
                                    <label class="checkboxoption1">
                                                <input type="checkbox" class="IsValidForPickupOrders" value="option1" checked="">Is Valid For Pickup Orders
                                            </label>
                                    <label class="checkboxoption1">
                                                <input type="checkbox" class="IsValidForDeliveryOrders" value="option1" checked="">Is Valid For Delivery Orders
                                            </label>
                                    <label class="checkboxoption1">
                                                <input type="checkbox" class="IsValidForCardOrders" value="option1" checked="">Is Valid For Card Orders
                                            </label>
                                    <label class="checkboxoption1">
                                                <input type="checkbox" class="IsValidForCashOrders" value="option1">Is Valid For Cash Orders
                                            </label>
                                    <label class="checkboxoption1">
                                                <input type="checkbox" class="IsValidForFirstOrderOnly" value="option1">Is Valid For First Order Only
                                            </label>
                                    <label class="checkboxoption1">
                                                <input type="checkbox" class="IsValidOncePerCustomer" value="option1">Is Valid Once Per Customer
                                            </label>
                                    <label class="checkboxoption1">
                                                <input type="checkbox" class="AutoApply" value="option1">Auto Apply
                                            </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-body">
            <button type="button" class="btn green updateVoucherConfig" style="float:right;">Submit</button>
        </div>
    </form>
</div>
'
  )
?>