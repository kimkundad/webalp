<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8" />
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title>Fresh Bootstrap Table by Creative Tim</title>

<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

<link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet" />
<link href="{{url('assets/css/fresh-bootstrap-table.css')}}" rel="stylesheet" />

<!--     Fonts and icons     -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="wrapper">
<div class="container">
    <div class="row">
        <div class="col-md-10" >
          <div class="description">
                <br>
            </div>

            <div class="fresh-table full-color-orange">
            <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                    Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
            -->

                <div class="toolbar">
                    <h4 style="margin: 0px 0px 0px 15px;">Webalp Table</h4>
                </div>

                <table id="fresh-table" class="table">
                    <thead>
                        <th data-field="izic_id">izic_id</th>
                      <th data-field="izic_name" data-sortable="true">izic_name</th>
                      <th data-field="link_name" data-sortable="true">link_name</th>
                      <th data-field="date" data-sortable="true">date</th>
                      <th data-field="status">status</th>
                      <th data-field="link_id">link_id</th>
                      <th data-field="type">type</th>
                      <th data-field="actions" >Actions</th>
                    </thead>
                    <tbody>

                      @if($objs)
                      @foreach($objs as $u)
                        <tr>
                          <td>{{$u->izic_id}}</td>
                          <td>{{$u->izic_name}}</td>
                          <td>{{$u->link_name}}</td>
                          <td>{{$u->date}}</td>
                          <td>{{$u->status}}</td>
                          <td>{{$u->link_id}}</td>
                          <td>{{$u->type}}</td>
                          <td>
                            <a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">
                              <i class="fa fa-remove"></i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      @endif

                    </tbody>
                </table>
            </div>



            <div class="description description-footer">



            </div>






        </div>


        <div class="col-md-2" >
          <br>
          <h6 >Duplicate Data</h6>



          <div class="fresh-table full-color-orange">
          <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                  Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
          -->



              <table class="table">

                  <tbody>

                    @if($dupli)
                    @foreach($dupli as $duplis)
                      <tr>
                        <td>{{$duplis->izic_id}}</td>
                      </tr>
                      @endforeach
                    @endif

                  </tbody>
              </table>
          </div>

          </div>

    </div>






</div>
</div>

</body>
<script type="text/javascript" src="{{url('assets/js/jquery-1.11.2.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/bootstrap-table.js')}}"></script>

<script type="text/javascript">
    var $table = $('#fresh-table'),
        $alertBtn = $('#alertBtn'),
        full_screen = false;

    $().ready(function(){
        $table.bootstrapTable({
            toolbar: ".toolbar",

            showRefresh: true,
            search: true,
            showToggle: true,
            showColumns: true,
            pagination: true,
            striped: true,
            pageSize: 8,
            pageList: [8,10,25,50,100],

            formatShowingRows: function(pageFrom, pageTo, totalRows){
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber){
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });



        $(window).resize(function () {
            $table.bootstrapTable('resetView');
        });


        window.operateEvents = {
            'click .like': function (e, value, row, index) {
                alert('You click like icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);
            },
            'click .edit': function (e, value, row, index) {
                alert('You click edit icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);
            },
            'click .remove': function (e, value, row, index) {
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: [row.id]
                });

            }
        };

        $alertBtn.click(function () {
            alert("You pressed on Alert");
        });

    });


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
        ].join('');
    }


</script>
</html>
