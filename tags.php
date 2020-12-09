<?php
include("../xt/report/mpdf.php");
/*$html='';
for($i=0; $i<=50; $i++){
$html.='<table width="101%" border="0" align="center" cellspacing="2">
  <tr>
    <th scope="col" >
      <table width="100%" border="0" style="border:1px solid #305335;">
        <tr>
          <th scope="col"><img src="picx/logo.png" alt="" width="105" height="88" /></th>
          <th scope="col">
          <h1>Nacoss KUST</h1>
            <h2>Conference<br/>
            Participant<br/><br/>
            COM/2014/001</h2></th>
        </tr>
      </table>
   </th>
    <th width="53%" scope="col"><table width="100%" border="0" style="border:1px solid #305335;">
      <tr>
        <th scope="col"><img src="picx/logo.png" alt="" width="105" height="88" /></th>
        <th scope="col"> <h1>Nacoss KUST</h1>
          <h2>Conference<br/>
            Participant<br/>
            <br/>
            COM/2014/001</h2></th>
      </tr>
    </table></th>
  </tr>
</table>';
}
echo $html;
*/
$hmtl="ok";
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>