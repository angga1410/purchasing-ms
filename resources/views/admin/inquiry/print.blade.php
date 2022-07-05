@extends('layouts.admin')

@section('content')

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="container">
        <div class=" row justify-content-end m--padding-15 ">
            <a href="" class="btn btn-accent m-btn m-btn--air m-btn--custom" onclick="printDiv('printableArea')">PRINT</a>
        </div>
    </div>
    <div id="printableArea">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row p-5">
                                <div class="col-md-6">
                                    <img src="/admin/images/gspe.png" width="30%">
                                    <p class="mb-1"><span class="text-muted">PT. GRAHA SUMBER PRIMA ELEKTRONIK </span></p>
                                    <p class="mb-1"><span class="text-muted">INTERCON PLAZA BLOK D11 </span></p>
                                    <p class="mb-1"><span class="text-muted">JL. MERUYA ILIR, SRENGSENG-KEMBANGAN</p>
                                    <p class="mb-1"><span class="text-muted">Phone (62-21)7587-9949/51 </span></p>
                                    <!-- <p class="mb-1"><span class="text-muted"> NPWP : 01.789.513.038.000 </span></p> -->
                                </div>

                                <div class="col-md-6 text-right">
                                   
                                    <p class="font-weight-bold mb-1" value="" onchange="location = this.value;"></p>

                                    <p class="text-muted">{{ date("Y-m-d H:i:s")}}</p>
                                    <p class="font-weight-bold mb-1"> REQUEST INQUIRY </p>
                                    <p class="font-weight-bold mb-1"> No. {{$data->rfi_num}}{{$data->rfi_num_seq}} </p>
                                    <p class="font-weight-bold mb-1"> Date. {{$data->created_at}} </p>
                                    
                                </div>
                            </div>

                            <hr class="my-5">

                            <div class="row pb-5 p-5">
                                <div class="col-md-12">
                                    <p class="font-weight-bold mb-4">VENDOR NAME</p>
                                 
                                    <p class="mb-1" ><span class="text-muted">{{$data->supplier->supplier_name}}</span></p>
                             

                                 
                                    <p class="mb-1" ><span class="text-muted">{{$data->contact->contact_name}} - {{$data->contact->contact_phone}}</span></p>
                                    <br>
                                    <p >
                                    <?php
$str = $data->remark;
echo html_entity_decode($str);
?>
                                        </p>
                                </div>
                          
                               
                            </div>

                            <div class="row p-5">
                                <div class="col-md-12">
                                    <div class="row" id="m_user_profile_tab_1">



                                        <table id="table">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                    <th>MFR</th>
                                                    <th>Part Name</th>
                                                   
                                                    <th>Part Description</th>
                                                  
                                                    <th>Quantity</th>
                                                    <th>U/M</th>
                                                
                                                
                                                </tr>
                                            </thead>

                                        </table>

                                    </div>
                                </div>
                            </div>

                            <!-- <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                                <div class="py-3 px-5 text-right">
                                    <div class="mb-2">Total Net Value Excl. Tax</div>

                                </div>


                            </div> -->
                            <div class="col-md-6">
                              
                                <p class="mb-1"><span class="text-muted"></span></p>
                                <p class="mb-1"><span class="text-muted"> </span></p>
                                <p class="mb-1"><span class="text-muted"> </span></p>

                            </div>
                            <br>

                            <!-- <div class="row">
                                <div class="col-sm">
                                    <p class="text-center"> PREPARED BY :
                                </div>
                                <div class="col-sm">
                                    <p class="text-center"> APPROVED BY :
                                </div>
                                <div class="col-sm">

                                </div>
                            </div> -->
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>


    <!-- <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script> -->
</div>
<?php
$dataid = $data->id;

?>
<!--  -->

<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
<!-- <style>.dataTables_length{display: none;} .dataTables_filter{display: none;}</style> -->
<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>
<script type="text/javascript">
    //
    function gettable(dataid) {

        $(function() {
            var table = $('#table').DataTable({
                paging: false,
                info: false,
                searching: false,
                processing: true,
                serverSide: true,
                ajax: "{{ URL::to('inquiry/get-data') }}/" + dataid,
                columns: [
                    {
                        data: 'part_num',
                        name: 'part_num'
                    },
                    {
                        data: 'mfr',
                        name: 'mfr'
                    },
                    {
                        data: 'part_name',
                        name: 'part_name'
                    },
                   
                    {
                        data: 'part_desc',
                        name: 'part_desc'
                    },

                  

                    {
                        data: 'qty',
                        name: 'qty'
                    },
                  
                    {
                        data: 'um',
                        name: 'um'
                    },
                ]
            });


        });
      
    }


    //


    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    var dataid = "<?php echo $dataid ?>";
    // console.log(dataid)
    window.onload = gettable(dataid);


</script>
@endsection