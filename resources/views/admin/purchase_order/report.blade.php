<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>

<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <title>Report Purchase Order</title>

  <style type="text/css">
    @media print {
      #printPageButton {
        display: none;
      }

      thead {
        counter-reset: my-sec-counter;
      }

      #pageFooter:before {
        counter-increment: my-sec-counter;
        content: "Page "counter(my-sec-counter);
        left: 100;
        top: 100%;
        white-space: nowrap;
        z-index: 20px;
        background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);
        background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);
      }
    }

    body {
      counter-reset: section;
      text-align: justify;
    }

    @page {
      size: A4;

    }

    .test {
      font-size: 0.65em !important;
      color: #000 !important;
      font-family: Arial !important;
    }

    .judul {
      font-size: 1.5em !important;
      color: #000 !important;
      font-family: Arial !important;
    }

    @media screen {
      div.divFooter {
        display: none;
      }
    }
  </style>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container container-fluid">


    <div id="printPageButton">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('purchase_order_list') }}" class="btn btn-accent m-btn m-btn--air m-btn--custom non-printable"><button class="btn btn-primary non-printable">Back</button></a>
        </div>
        <div class="card-body">
          <h5 class="card-title"></h5>
          <form action="{{ route('filter') }}" method="post">
            {{ csrf_field() }}

            <div class="filter manufacturer">
              <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-md-3 col-form-label">Period</label>
                <div class="col-md-7">
                  <input type="date" placeholder="Type to filter" class="form-control" name="period" required>
                </div>
              </div>
            </div>

            <div class="filter partName">
              <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-md-3 col-form-label">Until</label>
                <div class="col-md-7">
                  <input type="date" placeholder="Type to filter" class="form-control" name="until" required>
                </div>
              </div>
            </div>

            <div class="form-group m-form__group row">
              <label for="example-text-input" class="col-md-3 col-form-label">Delivery Status</label>
              <div class="col-md-7">
                <select required="" name="status" class="form-control form-control js-example-basic-single">
                  <option value="0">All</option>
                  <option value="2">Delivered</option>
                  <option value="1">On-Process</option>
                  <option value="0">Outstanding</option>

                </select>
              </div>
            </div>


            <div class="form-group m-form__group row">
              <label for="example-text-input" class="col-md-3 col-form-label">Vendor</label>
              <div class="col-md-7">
                <select required="" name="supplier_id" class="form-control js-example-basic-single">
                  <option value="0">All</option>
                  @foreach( $supplier as $get )
                  <option value="{{ $get->id }}">{{ $get->supplier_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>


            <div class="filter buttonFilter">
              <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-md-3 col-form-label"></label>
                <div class="col-md-7">
                  <button type="submit" class="btn btn-success">Filter</button>
                  <a href="{{ route('report') }}" class="btn btn-accent m-btn m-btn--air m-btn--custom">Reset</a>
                </div>
              </div>
            </div>
            <i><small>*klik reset sebelum melakukan filter</small></i>
          </form>
          <button class="btn btn-danger" onclick="tableToExcel('testTable', 'PO_Report_')">Export To Excel</button>
          <a href="" class="btn btn-accent m-btn m-btn--air m-btn--custom non-printable" onclick="printDiv('printableArea')"><button class="btn btn-danger non-printable" id="printPageButton">PRINT</button></a>
        </div>
      </div>
    </div>


    <div id="printableArea">
      <!-- <div class="card"> -->
      <div class="test">
        <div class="col-md-6">
          <img src="/admin/images/gspe.png" width="25%">

        </div>
        <div class="card-body">
          <div class="judul text-center">Report Purchase Order Outstanding</div>

          <div class="tab-content padding40px shadowDiv itemDiv">
            <p class="text-right">Nomor Dokumen : QF-PUR-0004</p>
            <p class="text-right">Nomor Revisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 01 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <p class="text-right">Tanggal Efektif : {{strftime("%a %d %b %Y", strtotime(date('Y-m-d')))}}</p>

            <div class="row" id="m_user_profile_tab_1">

              <!-- Item Module -->
              <table class="table table-bordered" id="testTable">
                <caption hidden>PURCHASE ORDER PERIODE : {{$period}} - {{$until}}</caption>
                <thead>
                  PERIODE : {{$period}} - {{$until}}
                  <tr>
                    <th>NO</th>
                    <th>PR#</th>
                    <th>PO#</th>
                    <th>Date</th>
                    <th>Vendor</th>
                    <th>MFR</th>
                    <th>Part Number</th>
                    <th>Part Desc</th>

                    <th>Qty</th>
                    <th>UM</th>
                    <th>Target Date</th>
                    <th>Curr</th>
                    <th>Unit Price </th>
                    <th>Status</th>
                    <th>Remark</th>





                  </tr>
                </thead>

                <tbody>
                  @foreach($data as $detail => $details)
                  <tr>
                    <td>{{ $detail +1 }}</td>
                    @foreach( $pr as $get )
                    @if( $get->id == $details->pr_detail_id )
                    <td>
                      {{ $get->pr_number }} {{ $get->pr_number_seq }}
                    </td>
                    @endif
                    @endforeach
                    <td>
                      {{$details->po->po_number}} {{$details->po->po_number_seq}}
                    </td>
                    <td>
                      {{strftime("%d-%b-%Y", strtotime($details->po->po_date))}}
                    </td>
                    @foreach( $supplier as $get )
                    @if( $get->id == $details->po->supplier_id )
                    <td>
                      {{ $get->supplier_name }}
                    </td>
                    @endif
                    @endforeach
                    </td>
                    <td>
                      {{$details->item->mfr}}
                    </td>
                    <td>
                      {{$details->item->part_num}}
                    </td>
                    <td>
                      {{$details->item->part_desc}}
                    </td>
                    <td>
                      {{$details->qty_pos}}
                    </td>
                    <td>
                      {{$details->um_pos}}
                    </td>
                    <td>
                      {{strftime("%d-%b-%Y", strtotime($details->target_date_new))}}
                    </td>
                    <td>
                      {{$details->curr}}
                    </td>
                    <td>
                      {{$details->unit_price}}
                    </td>
                    @if( $details->po->status == 2)
                    <td>
                      Delivered
                    </td>
                    @elseif ($details->po->status == 1)
                    <td>
                      On-Process
                    </td>
                    @else
                    <td>
                      Outstanding
                    </td>
                    @endif
                    <td>
                      {{$details->po->remark}}
                    </td>




                  </tr>
                  @endforeach
                </tbody>
              </table>

              <!-- /Item Module -->



            </div>

          </div>
        </div>

</body>

<small class="text-right font-italic">Print Date : {{ date("Y-m-d H:i")}}</small>
<br>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-single').select2({
      theme: "classic"
    });
  });

  function printDiv(divName) {
    var css = '@page { size: landscape; }',
      head = document.head || document.getElementsByTagName('head')[0],
      style = document.createElement('style');

    style.type = 'text/css';
    style.media = 'print';

    if (style.styleSheet) {
      style.styleSheet.cssText = css;
    } else {
      style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);

    window.print();

  }

  function exportTableToExcel(tableID, filename = '') {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

    // Specify file name
    filename = filename ? filename + '.xls' : 'PO_Report' + today;

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
      var blob = new Blob(['\ufeff', tableHTML], {
        type: dataType
      });
      navigator.msSaveOrOpenBlob(blob, filename);
    } else {
      // Create a link to the file
      downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

      // Setting the file name
      downloadLink.download = filename;

      //triggering the function
      downloadLink.click();
    }
  }


  var tableToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,',
      template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
      base64 = function(s) {
        return window.btoa(unescape(encodeURIComponent(s)))
      },
      format = function(s, c) {
        return s.replace(/{(\w+)}/g, function(m, p) {
          return c[p];
        })
      }
    return function(table, name) {
      if (!table.nodeType) table = document.getElementById(table)
      var ctx = {
        worksheet: name || 'Worksheet',
        table: table.innerHTML
      }
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      today = mm + '/' + dd + '/' + yyyy;
      var a = document.createElement('a');
      a.href = uri + base64(format(template, ctx))
      a.download = name + today + '.xls';
      //triggering the function
      a.click();
    }
  })()
</script>