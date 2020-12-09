
<nav class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" role="navigation">
 <div class="brand"> <i class="fa fa-windows fa-fw fa-3x"></i></div>
 <br/>
  <table style=" margin-left:60px;">
<tr>
<td><i class="fa fa-home fa-4x"></i><span class="text"></td>
<td align="left" valign="middle"><span style="font-size:22px"></span></td>
</tr>
<tr>
<td><i class="fa fa-user fa-4x"></i><span class="text"></td>
<td align="left" valign="middle"><span style="font-size:22px">Maitama Sule Science</span></td>
</tr>
<tr>
<td><i class="fa  fa-question-circle fa-4x"></i><span class="text"></td>
<td align="left" valign="middle"><span style="font-size:22px"> Question : <?php if(isset($_GET['id'])){	echo $_GET['id']; }else{ 	echo 1; }?></span></td>
</tr>
<tr>
<td><i class="fa fa-clock-o fa-4x"></i><span class="text"></td>
<td align="left" valign="middle"><span style="font-size:22px">0:<span id="counter"></span> sec</span></td>
</tr>
<tr>
<td style="height:50px;"></td>
<td align="left" valign="middle"></td>
</tr>
<tr>
<td style="height:50px;"></td>
<td align="left" valign="middle"></td>
</tr>

</table>
<br/>
<div style=" padding-left:150px; padding-top:15px; border-top:1px solid #9FCC91; display:none;" id="loader"> <i class="fa  fa-refresh fa-spin fa-fw fa-4x"></i></div>
</nav>