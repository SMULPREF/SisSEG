<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>

  <!-- Style -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../assets/css/fresh-bootstrap-table.css" rel="stylesheet" />

  <!-- Fonts and icons -->
  <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">

  <?php include_once '../../sidebar.php'; ?>

</head>

<body>
  <div class="fresh-table full-color-orange">
    <div class="toolbar">
        <button id="alertBtn" class="btn btn-default">Alert</button>
    </div>

    <table id="fresh-table" class="table">
      <thead>
        <th scope="col">NOME</th>
        <th scope="col">RF/RG</th>
        <th scope="col">USUARIO</th>
        <th scope="col">Aprova Digital</th>
        <th scope="col">Portal de Licenciamento/Anistia</th>
        <th scope="col">SEI</th>
        <th scope="col">SIMPROC</th>
        <th scope="col">SISACOE</th>
        <th scope="col">SisSEL</th>
        <th scope="col">SLCE</th>
        <th scope="col">SLCII</th>
        <th scope="col">SITUAÇÃO<br> (Ativo/Inativo<br>/Suspenso)</th>
        <th scope="col">OBSERVAÇÕES</th>
        <th scope="col">UNIDADE DE TRABALHO</th>
        <th scope="col">E-MAIL</th>
      </thead>
      <tbody>
        <?php include 'getPessoa.php'; ?>
      </tbody>
    </table>
  </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.js"></script>

<script type="text/javascript">
  var $table = $('#fresh-table')
  var $alertBtn = $('#alertBtn')

  window.operateEvents = {
    'click .like': function (e, value, row, index) {
      alert('You click like icon, row: ' + JSON.stringify(row))
      console.log(value, row, index)
    },
    'click .edit': function (e, value, row, index) {
      alert('You click edit icon, row: ' + JSON.stringify(row))
      console.log(value, row, index)
    },
    'click .remove': function (e, value, row, index) {
      $table.bootstrapTable('remove', {
        field: 'id',
        values: [row.id]
      })
    }
  }

  function operateFormatter(value, row, index) {
    return [
      '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
      '<i class="fa fa-heart"></i>',
      '</a>',
      '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
      '<i class="fa fa-edit"></i>',
      '</a>',
      '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
      '<i class="fa fa-remove"></i>',
      '</a>'
    ].join('')
  }

  $(function () {
    $table.bootstrapTable({
      classes: 'table table-hover table-striped',
      toolbar: '.toolbar',

      search: true,
      showRefresh: true,
      showToggle: true,
      showColumns: true,
      pagination: true,
      striped: true,
      sortable: true,
      pageSize: 8,
      pageList: [8, 10, 25, 50, 100],

      formatShowingRows: function (pageFrom, pageTo, totalRows) {
        return ''
      },
      formatRecordsPerPage: function (pageNumber) {
        return pageNumber + ' rows visible'
      }
    })

    $alertBtn.click(function () {
      alert('You pressed on Alert')
    })
  })

</script>

</html>

<style>

.fresh-table {
  margin: 5vh 1vw 0 0;
  box-shadow: 2px 3px 10px #AFA5D9;
}

.table{
  font-size: 12px;
  color: black;
  text-align: center;
}

th{
  font-weight: bold !important;
  text-align: center;
  font-size: 12.5px !important;
}

option {
  background-color: black;
}

.dis {
  display: flex;
}

.bx {
  font-size: 20px;
  padding: 13px 9px;
}

.nav-top {
  margin-bottom: 510px;
}

.bx-menu {
  font-size: 24px;
  height: calc(var(--header-height) + 1rem);
}

.header {
  padding: 50px auto;
}

.select-filtro {
  appearance: none;
}

.option-escolha:hover>.span-escolha {
  display: none;
}
</style>