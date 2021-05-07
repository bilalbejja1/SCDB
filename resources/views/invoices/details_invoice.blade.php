@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    SCDB | Detalles de la factura
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Lista de facturas</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Detalles de la factura</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    @if (session()->has('Delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li>
                                                <a href="#tab1" class="nav-link active" data-toggle="tab">
                                                    Información de la factura
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab2" class="nav-link" data-toggle="tab">
                                                    Estados de pago
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab3" class="nav-link" data-toggle="tab">
                                                    Archivos adjuntos
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab1">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Número de factura</th>
                                                            <td>{{ $invoice->number }}</td>
                                                            <th scope="row">Fecha de lanzamiento</th>
                                                            <td>{{ $invoice->date }}</td>
                                                            <th scope="row">Fecha de vencimiento</th>
                                                            <td>{{ $invoice->due_date }}</td>
                                                            <th scope="row">Sección</th>
                                                            <td>{{ $invoice->section->name }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Producto</th>
                                                            <td>{{ $invoice->product }}</td>
                                                            <th scope="row">Importe de la recaudación</th>
                                                            <td>{{ $invoice->amount_collection }}</td>
                                                            <th scope="row">Monto de la comisión</th>
                                                            <td>{{ $invoice->amount_commission }}</td>
                                                            <th scope="row">Descuento</th>
                                                            <td>{{ $invoice->discount }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Tasa de impuesto</th>
                                                            <td>{{ $invoice->rate_vat }}</td>
                                                            <th scope="row">El monto del impuesto</th>
                                                            <td>{{ $invoice->value_vat }}</td>
                                                            <th scope="row">Total con impuestos</th>
                                                            <td>{{ $invoice->total }}</td>
                                                            <th scope="row">Estado actual</th>

                                                            @if ($invoice->value_status == 1)
                                                                <td><span
                                                                        class="badge badge-pill badge-success">{{ $invoice->status }}</span>
                                                                </td>
                                                            @elseif($invoice->value_status ==2)
                                                                <td><span
                                                                        class="badge badge-pill badge-danger">{{ $invoice->status }}</span>
                                                                </td>
                                                            @else
                                                                <td><span
                                                                        class="badge badge-pill badge-warning">{{ $invoice->status }}</span>
                                                                </td>
                                                            @endif
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Observaciones</th>
                                                            <td>{{ $invoice->note }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab2">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                        <tr class="text-dark">
                                                            <th>#</th>
                                                            <th>Número de factura</th>
                                                            <th>Tipo de producto</th>
                                                            <th>Sección</th>
                                                            <th>Estado de pago</th>
                                                            <th>Fecha de pago</th>
                                                            <th>Observaciones</th>
                                                            <th>Fecha de adición</th>
                                                            <th>Usuario</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                        @if (count($details) > 0)
                                                            @foreach ($details as $detail)
                                                                <?php $i++; ?>
                                                                <tr>
                                                                    <td>{{ $i }}</td>
                                                                    <td>{{ $detail->invoice_number }}</td>
                                                                    <td>{{ $detail->product }}</td>
                                                                    <td>{{ $invoice->section->name }}</td>
                                                                    @if ($detail->value_status == 1)
                                                                        <td><span
                                                                                class="badge badge-pill badge-success">{{ $detail->status }}</span>
                                                                        </td>
                                                                    @elseif($detail->value_status ==2)
                                                                        <td><span
                                                                                class="badge badge-pill badge-danger">{{ $detail->status }}</span>
                                                                        </td>
                                                                    @else
                                                                        <td><span
                                                                                class="badge badge-pill badge-warning">{{ $detail->status }}</span>
                                                                        </td>
                                                                    @endif
                                                                    <td>{{ $detail->payment_date }}</td>
                                                                    <td>{{ $detail->note }}</td>
                                                                    <td>{{ $detail->created_at }}</td>
                                                                    <td>{{ $detail->user }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <td colspan="5">No hay nigún detalle</td>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab3">
                                            <!--Archivos adjuntos-->
                                            <div class="card card-statistics">
                                                <div class="card-body">
                                                    <p class="text-danger">* Formato de archivo adjunto pdf, jpeg, .jpg, png
                                                    </p>
                                                    <h5 class="card-title">Agregar archivos adjuntos</h5>
                                                    <form method="post" action="{{ url('/invoice-attachments') }}"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="file_name"
                                                                name="file_name" required>
                                                            <input type="hidden" id="invoice_number" name="invoice_number"
                                                                value="{{ $invoice->number }}">
                                                            <input type="hidden" id="invoice_id" name="invoice_id"
                                                                value="{{ $invoice->id }}">
                                                            <label class="custom-file-label" for="uploadedFile">
                                                                Seleccione el adjunto
                                                            </label>
                                                        </div>
                                                        <br><br>
                                                        <button type="submit" class="btn btn-primary btn-sm "
                                                            name="uploadedFile">Confirmar</button>
                                                    </form>
                                                </div>
                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">#</th>
                                                                <th scope="col">Nombre del archivo</th>
                                                                <th scope="col">Hizo adición</th>
                                                                <th scope="col">Fecha de adición</th>
                                                                <th scope="col">Procesos</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                            @if (count($attachments) > 0)
                                                                @foreach ($attachments as $attachment)
                                                                    <?php $i++; ?>
                                                                    <tr>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $attachment->file_name }}</td>
                                                                        <td>{{ $attachment->created_by }}</td>
                                                                        <td>{{ $attachment->created_at }}</td>
                                                                        <td colspan="2">

                                                                            <a class="btn btn-outline-success btn-sm"
                                                                                href="{{ url('view-file') }}/{{ $invoice->number }}/{{ $attachment->file_name }}"
                                                                                role="button"><i
                                                                                    class="fas fa-eye"></i>&nbsp;
                                                                                Ver</a>

                                                                            <a class="btn btn-outline-info btn-sm"
                                                                                href="{{ url('download') }}/{{ $invoice->number }}/{{ $attachment->file_name }}"
                                                                                role="button"><i
                                                                                    class="fas fa-download"></i>&nbsp;
                                                                                Descargar</a>
                                                                            <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attachment->file_name }}"
                                                                                data-invoice_number="{{ $attachment->invoice_number }}"
                                                                                data-id_file="{{ $attachment->id }}"
                                                                                data-target="#delete_file">Eliminar</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <td colspan="5">No hay nigún adjunto</td>
                                                            @endif
                                                        </tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>
    </div>
    <!-- /row -->

    <!-- Eliminar adjunto -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar el adjunto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete_file') }}" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red">¿Estás seguro del proceso de eliminación del archivo adjunto?</h6>
                        </p>

                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="invoice_number" id="invoice_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })

    </script>

    <script>
        // Para el nombre del archivo aparezca al seleccionar
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection