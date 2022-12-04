<main>
	<div class="page-content">
   <div class="container" style="margin-bottom:100px;margin-top:100px;">
<center><img class="img-brand" src="<?= base_url() . "assets/" ?>images/logo-text.png" style="width:50%"></center>
    <?= $hasil?>
<!--   <?= $result;?> -->

 
    <tr><th style="text-align: left; border-bottom:1px solid #CCC;">Expected Data</th>
          <td style="border-bottom:1px solid #CCC;"> <?= $expected;?></td></tr>
     <tr><th style="text-align: left; border-bottom:1px solid #CCC;">Result Data</th>
          <td style="border-bottom:1px solid #CCC;"> <?= $result;?></td></tr>
      <tr><th style="text-align: left; border-bottom:1px solid #CCC;">Notes</th>
          <td style="border-bottom:1px solid #CCC;"> <?= $notes;?></td></tr>
  </table>

        </div>
      </div>
    </main>
