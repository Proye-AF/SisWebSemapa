<!-- resources/views/reporte_combustible/imprimir.blade.php -->

@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/lasser.css') }}">
<div class="primera-parte">
    <div style=" justify-content: space-between; font-weight: bold; margin-top: 10px; margin-bottom:10px">
        <div class="logo-container">
            <img src="{{ asset('sema/logosemapa.png') }}" alt="Logo" class="logo">
            <h6 style="font-weight: bold;">PEDIDO COMBUSTIBLE</h6>
        </div>
        <div style="text-align: right; font-size: 12px">
            <div style="font-weight: bold;">N° de Solicitud: {{ str_pad($reporte->id, 6, '0', STR_PAD_LEFT) }}/{{ date('Y') }}</div>
            <div style="font-weight: bold;">Fecha de Pedido: {{ $reporte->created_at->format('d/m/Y') }}</div>
        </div>
    </div>
    <div class="datos-vehiculo">
        <h6>Datos del Vehículo</h6>
        <table>
            <tr>
                <th>No Móvil:</th>
                <td>{{ trim($reporte->no_movil) }}</td>
                <th>Marca:</th>
                <td>{{ $reporte->marca }}</td>
                <th>Tipo:</th>
                <td>{{ $reporte->tipo }}</td>
                <th>Kilometraje:</th>
                <td>{{ $reporte->kilometraje }}</td>
                <th>Placa:</th>
                <td>{{ $reporte->placa }}</td>
            </tr>
            <tr>
                <th>Actividad o Proyecto:</th>
                <td colspan="5">{{ $reporte->actividad_proyecto }}</td>
            </tr>
            <tr>
                <th>Unidad Responsable:</th>
                <td colspan="5">{{ $reporte->unidad_responsable }}</td>
            </tr>
        </table>
    </div>
    <br>
    <div class="datos-combustible">
        <h6>Datos del Combustible</h6>
        <table>
            <tr>
                <th>Combustible:</th>
                <td>{{ $reporte->combustible_requerido }}</td>
                <th>Código Materiales:</th>
                <td>{{ $reporte->codigo_materiales }}</td>
                <th>Pedido:</th>
                <td>{{ $reporte->cantidad_pedido }}</td>
                <th>Entregado:</th>
                <td>{{ $reporte->cantidad_entregado }}</td>
            </tr>
            <tr>
                <th>Valor Unitario:</th>
                <td>{{ $reporte->precio_unitario }}</td>
                <th>Valor Parcial:</th>
                <td>{{ $reporte->precio_parcial }}</td>
                <th>Total:</th>
                <td colspan="5">{{ $reporte->precio_total }}</td>
            </tr>
        </table>
    </div>

    <div class="firmas">
        <div style="display: inline-block; margin-right: 150px; text-align: center;margin-top: -18px; ">
            <p style="margin: 0; line-height: 1.5;">{{$reporte->nombres}}</p>
            <strong>Recibido Por:</strong>
            <p style="margin: 0; line-height: 1.5;">(Conductor del Vehículo)</p>
            <p style="margin: 0;">Fecha:{{ $reporte->created_at->format('d/m/Y') }}</p>
            <!-- Espacio para que el usuario escriba su nombre -->
        </div>
        <div style="display: inline-block; margin-right: 100px; text-align: center;">
            <strong>Solicitado Por:</strong>
            <p style="margin: 0; line-height: 1.5;">(Jefe Unidad Solicitante)</p>
            <p style="margin: 0;">Fecha:{{ $reporte->created_at->format('d/m/Y') }}</p>
            <!-- Espacio para que el usuario escriba su nombre -->
        </div>
        <div style="display: inline-block; margin-left: 20px; text-align: center;">
            <strong>Aprobado Por:</strong>
            <p style="margin: 0; line-height: 1.5;">(Gerente de Área/Jefe Dpto)</p>
            <!-- Espacio para que el usuario escriba su nombre -->
        </div>
    </div>
    <br>
    <div style="display: inline-block; margin-right: 150px; text-align: center;" class="func">
        <strong>Nombre:...............................................</strong>
        <p style="margin: 0; line-height: 1.5;">Atención de Guía</p>
        <p style="margin: 0;">(Funcionario de Estación de Servicio)</p>
        <p style="margin: 0;">Fecha:{{ $reporte->created_at->format('d/m/Y') }}</p>
        <!-- Espacio para que el usuario escriba su nombre -->
    </div>
    <div style="display: inline-block; margin-right: 100px; text-align: center;" class="nota">
        <strong>Nota:</strong>
        <p style="margin: 0; line-height: 1.5; display: inline-block; font-weight: bold;">{{ $reporte->nota }}</p>
        <!-- Espacio para que el usuario escriba su nombre -->
    </div>
</div>
<br>
<div class="segunda-parte">
    <div style=" justify-content: space-between; font-weight: bold; margin-top: 10px; margin-bottom:10px">
        <div class="logo-container">
            <img src="{{ asset('sema/logosemapa.png') }}" alt="Logo" class="logo">
            <h6 style="font-weight: bold;">PEDIDO COMBUSTIBLE</h6>
        </div>
        <div style="text-align: right; font-size: 12px">
            <div style="font-weight: bold;">N° de Solicitud: {{str_pad($reporte->id, 6, '0', STR_PAD_LEFT) }}/{{ date('Y') }}</div>
            <div style="font-weight: bold;">Fecha de Pedido: {{ $reporte->created_at->format('d/m/Y') }}</div>
        </div>
    </div>
    <div class="datos-vehiculo">

        <h6>Datos del Vehículo</h6>
        <table>
            <tr>
                <th>No Móvil:</th>
                <td>{{ $reporte->movil }}</td>
                <th>Marca:</th>
                <td>{{ $reporte->marca }}</td>
                <th>Tipo:</th>
                <td>{{ $reporte->tipo }}</td>
                <th>Kilometraje:</th>
                <td>{{ $reporte->kilometraje }}</td>
                <th>Placa:</th>
                <td>{{ $reporte->placa }}</td>
            </tr>
            <tr>
                <th>Actividad o Proyecto:</th>
                <td colspan="5">{{ $reporte->actividad_proyecto }}</td>
            </tr>
            <tr>
                <th>Unidad Responsable:</th>
                <td colspan="5">{{ $reporte->unidad_responsable }}</td>
            </tr>
        </table>
    </div>
    <br>
    <div class="datos-combustible">
        <h6>Datos del Combustible</h6>
        <table>
            <tr>
                <th>Combustible:</th>
                <td>{{ $reporte->combustible_requerido }}</td>
                <th>Código Materiales:</th>
                <td>{{ $reporte->codigo_materiales }}</td>
                <th>Pedido:</th>
                <td>{{ $reporte->cantidad_pedido }}</td>
                <th>Entregado:</th>
                <td>{{ $reporte->cantidad_entregado }}</td>
            </tr>
            <tr>

                <th>Valor Unitario:</th>
                <td>{{ $reporte->precio_unitario }}</td>
                <th>Valor Parcial:</th>
                <td>{{ $reporte->precio_parcial }}</td>
                <th>Total:</th>
                <td colspan="5">{{ $reporte->precio_total }}</td>
            </tr>
        </table>
    </div>
    <div class="firmas">
        <div style="display: inline-block; margin-right: 150px; text-align: center;margin-top: -18px; ">
            <p style="margin: 0; line-height: 1.5;">{{$reporte->nombres}}</p>
            <strong>Recibido Por:</strong>
            <p style="margin: 0; line-height: 1.5;">(Conductor del Vehículo)</p>
            <p style="margin: 0;">Fecha:{{ $reporte->created_at->format('d/m/Y') }}</p>
            <!-- Espacio para que el usuario escriba su nombre -->
        </div>
        <div style="display: inline-block; margin-right: 100px; text-align: center;">
            <strong>Solicitado Por:</strong>
            <p style="margin: 0; line-height: 1.5;">(Jefe Unidad Solicitante)</p>
            <p style="margin: 0;">Fecha:{{ $reporte->created_at->format('d/m/Y') }}</p>
            <!-- Espacio para que el usuario escriba su nombre -->
        </div>
        <div style="display: inline-block; margin-left: 20px; text-align: center;">
            <strong>Aprobado Por:</strong>
            <p style="margin: 0; line-height: 1.5;">(Gerente de Área/Jefe Dpto)</p>
            <!-- Espacio para que el usuario escriba su nombre -->
        </div>
    </div>
    <br>
    <div style="display: inline-block; margin-right: 150px; text-align: center;" class="func">
        <strong>Nombre:...............................................</strong>
        <p style="margin: 0; line-height: 1.5;">Atención de Guía</p>
        <p style="margin: 0;">(Funcionario de Estación de Servicio)</p>
        <p style="margin: 0;">Fecha:{{ $reporte->created_at->format('d/m/Y') }}</p>
        <!-- Espacio para que el usuario escriba su nombre -->
    </div>
    <div style="display: inline-block; margin-right: 100px; text-align: center;" class="nota">
        <strong>Nota:</strong>
        <p style="margin: 0; line-height: 1.5; display: inline-block; font-weight: bold;">{{ $reporte->nota }}</p>
        <!-- Espacio para que el usuario escriba su nombre -->
    </div>
    <button id="printButton" class="btn btn-success" onclick="imprimir()">Imprimir</button>
    

</div>
    <script>
        function imprimir() {
            window.print(); // Esta función invoca la ventana de impresión del navegador
        }
    </script>

