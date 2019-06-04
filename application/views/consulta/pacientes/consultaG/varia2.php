<?php

$primera_r = @$_POST['primera_r'];
$parejasx = @$_POST['parejasx'];
$estadoc = @$_POST['estadoc'];
$actividadx = @$_POST['actividadx'];
$histerectomia = @$_POST['histerectomia'];
$oforectomia = @$_POST['oforectomia'];
$vph_cervical = @$_POST['vph_cervical'];
$vph_condiloma = @$_POST['vph_condiloma'];
$herpes_genital = @$_POST['herpes_genital'];
$endometriosis = @$_POST['endometriosis'];
$sop = @$_POST['sop'];
$ultimo_p = @$_POST['ultimo_p'];
$anticonceptivos = @$_POST['anticonceptivos'];
$paridad = @$_POST['paridad'];
$partos = @$_POST['partos'];
$cesareas = @$_POST['cesareas'];
$aborto = @$_POST['aborto'];
$ectopico = @$_POST['ectopico'];
$antecedentes_gine = @$_POST['antecedentes_gine'];
$antecedentes_obste = @$_POST['antecedentes_obste'];
$notas_gineco = @$_POST['notas_gineco'];
$notas_obste = @$_POST['notas_obste'];
						<label><input name="histerectomia" type="checkbox" class="icheck"> Histerectom&iacute;a </label><br>
						<label><input name="oforectomia" type="checkbox" class="icheck"> Oforectom&iacute;a </label><br>
						<label><input name="vph_cervical" type="checkbox" class="icheck"> VPH Cervical </label><br>
						<label><input name="vph_condiloma" type="checkbox" class="icheck"> VPH Condiloma </label><br>
						<label><input name="herpes_genital" type="checkbox" class="icheck"> Herpes Genital </label><br>
						<label><input name="endometriosis" type="checkbox" class="icheck"> EIP/Endometriosis </label><br>
						<label><input name="sop" type="checkbox" class="icheck"> SOP </label><br>
$data = array(        
'primera_r' => $primera_r,
'parejasx' => $parejasx,
'estadoc' => $estadoc,
'actividadx' => $actividadx,
'histerectomia' => $histerectomia,
'oforectomia' => $oforectomia,
'vph_cervical' => $vph_cervical,
'vph_condiloma' => $vph_condiloma,
'herpes_genital' => $herpes_genital,
'endometriosis' => $endometriosis,
'sop' => $sop,
'ultimo_p' => $ultimo_p,
'anticonceptivos' => $anticonceptivos,
'paridad' => $paridad,
'partos' => $partos,
'cesareas' => $cesareas,
'aborto' => $aborto,
'ectopico' => $ectopico,
'antecedentes_gine' => $antecedentes_gine,
'antecedentes_obste' => $antecedentes_obste,
'notas_gineco' => $notas_gineco,
'notas_obste' => $notas_obste,
'fe_create' => $fe_create,
'fe_update' => $fe_update);
