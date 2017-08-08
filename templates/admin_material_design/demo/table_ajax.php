<?php
  /* 
   * Paging
   */

  $iTotalRecords = 178;
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;

  $subtype_list = array(
    array("danger" => "None"),
    array("info" => "SignUp"),
    array("info" => "Loyalty"),
    array("info" => "Loyalty25"),
    array("info" => "Retention"),
    array("info" => "SecondaryRetention"),
    array("success" => "Custom"),
  );
  $td_list = array(
    array(20 => "20% OFF"),
    array(24 => "€24 OFF"),
    array(5 => "€5 OFF")
  );

  for($i = $iDisplayStart; $i < $end; $i++) {
    $index = rand(1, 2);
    $subtype = $subtype_list[rand(0, 6)];
    $typeAndDisc = $td_list[$index];
    $id = ($i + 1);
    $typeVal = ++$index;
    $isActive = rand(0, 1);
    $isEditable = 0;
    if (current($subtype) == "Custom")
    {
      $isEditable = 1;
    }
    $records["data"][] = array(
      '<input type="checkbox" name="id[]" value="'.$id.'" data-isactive="'.$isActive.'" data-iseditable="'.$isEditable.'">',
      '<span class="label label-sm label-'.(key($subtype)).'">'.(current($subtype)).'</span>',
      '<span data-voucherid="'.$id.'"><a href="#" class="vcodeedit" data-type="text" data-pk="1" data-url="demo/table_ajax.php" data-title="Enter voucher code">prxx20</a></span>',
      '<a href="#" class="dateedit" data-type="date" data-pk="1" data-url="demo/table_ajax.php" data-title="Select Start date">12/10/2013</a>',
      '<a href="#" class="dateedit" data-type="date" data-pk="1" data-url="demo/table_ajax.php" data-title="Select End date">12/10/2013</a>',
      '<span class="eurosign">€</span><a href="#" class="amountedit" data-type="number" data-pk="1" data-url="demo/table_ajax.php" data-title="Enter value">'.key($typeAndDisc).'</a><span class="percentsign" hidden>%</span>&nbsp/&nbsp<a href="#" class="typeedit" data-type="select" data-value="'.$typeVal.'" data-pk="1" data-url="demo/table_ajax.php" data-title="Select type"></a>',
      '<a href="#" class="descedit" data-type="text" data-pk="1" data-url="demo/table_ajax.php" data-title="Enter description">'.(current($typeAndDisc)).'</a>',
      '<a href="javascript:;" class="btn btn-xs default view-detail"><i class="fa fa-search"></i> View</a>',
   );
  }

  if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
    $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
    $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
  }

  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  
  echo json_encode($records);
?>