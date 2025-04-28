<!DOCTYPE HTML>
<html>

<head>
  <title>Cetak Riwayat Medik Pasien</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/cetak.css">
  <style type="text/css">
    <!--
    .style2 {
      font-size: 14px;
      font-family: "Courier New", Courier, monospace;
      font-weight: bold;
    }

    .style14 {
      font-family: "Courier New", Courier, monospace;
      font-size: 13px;
    }

    .style15 {
      font-size: 12px
    }
    -->
    tr
    th
    {
    font-family:
    "Courier
    New",
    Courier,
    monospace;
    font-size:
    13px;
    font-weight:
    bold;
    }
    tr
    td
    {
    font-family:
    "Courier
    New",
    Courier,
    monospace;
    font-size:
    12px;
    }
  </style>
</head>

<body onload="window.print()">


  <table width="700" border="0" cellspacing="0" cellpadding="2" align="center">
    <tr>
      <b>
        <center>LAPORAN HISTORY PEMERIKSAAN DOKTER</center>
      </b>

      <center>Praktik Dokter Raysha Ramadhani</center><br>
      <!--<?php echo "<center>Oleh : " . $this->session->userdata('namalengkap') . "</center>"; ?><br>-->
      <td style="border-bottom:solid 1px #000000"><span class="style2">
        </span></td>
    </tr>
  </table><br />

  <!--<div class="title" align='center'>
      <?php echo "<center>Klinik Dokter</center>"; ?><br>
      <?php echo ""; ?><br>
      <?php echo ""; ?> <br>
      <br>
      <?php echo "<center>LAPORAN HISTORY PEMERIKSAAN DOKTER</center>"; ?><br>
      <?php echo $this->session->userdata('namalengkap'); ?><br>
    </div>-->


  <div class="content"><!-- 
      <h3>Data Pasien</h3> -->
  </div>

  <table class="table" align="center">
    <tr class="info">
      <th width="10%">NRP</th>
      <th width="30%">Nama</th>
      <th width="5%">Jenis Kelamin</th>
      <th width="5%">Umur</th>
      <th width="50%">Alamat</th>
      <th width="50%">Telp</th>
    </tr>

    <tbody>
      <?php if (empty($cetak)) {
        echo '<tr><td colspan="6">Data tidak tersedia.</td></tr>';
      } else {
        foreach ($cetak as $rowcetak) :
      ?>
          <tr>
            <td><?php echo $rowcetak->id; ?></td>
            <td><?php echo $rowcetak->namalengkap; ?></td>
            <td><?php echo $rowcetak->jenis_kelamin; ?></td>
            <td><?php echo $rowcetak->umur; ?> Th</td>
            <td><?php echo $rowcetak->alamat; ?> </td>
            <td><?php echo $rowcetak->telp; ?> </td>
          </tr>

      <?php

        endforeach;
      }
      ?>
    </tbody>
  </table>
  <table width="700" border="0" cellspacing="0" cellpadding="2" align="center">
    <tr>
      <td width="1200">&nbsp;</td><br><br><br>
      <td width="164" class="style14">Hormat Kami </td>
    </tr>
  </table>

</body>

</html>
<script type="text/javascript">
  document.onkeydown = function(e) {
    if (e.keyCode == 27) { //--ESC--
      setTimeout('self.location.href = "<?php echo site_url(); ?>/laporan"', 0);
    } else if (e.keyCode == 13) { //--Tombol ENTER--
      window.print();
    }
  }
</script>