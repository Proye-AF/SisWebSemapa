@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
@section('content')
 <h1 ><center>Lista de Reportes de Combustible</center></h1>
 <table class="tabla">
     <thead>
         <tr>
             <th>ID</th>
             <th>Movil</th>
             <th>Placa</th>
             <th>Marca</th>
             <th>Item</th> 
             <th>Nombre Conductor</th>
             <th>Fecha</th>  
             <th>Usuario</th>
             <th>Acciones</th>
         </tr>
     </thead>
     <tbody class="botones">
         @foreach ($reportes as $reporte)
             <tr>
                 <td>{{ $reporte->id }}</td>
                 <td>{{ $reporte->no_movil }}</td>
                 <td>{{ $reporte->placa }}</td>
                 <td>{{ $reporte->marca }}</td>
                 <td>{{ $reporte->item}}</td>  
                 <td>{{ $reporte->nombres}}</td>  
                 <td>{{ $reporte->created_at->format('d/m/Y')}}</td>
                 <td>{{ $reporte->username }}</td>
                 <td>
                     <a href="{{ route('ver_reporte_combustible', ['id' => $reporte->id]) }}" class="btn btn-primary">Ver Reporte</a>
                     
                     @if (!$reporte->anulado)
                         <form method="POST" action="{{ route('anular_reporte_combustible', ['id' => $reporte->id]) }}" style="display: inline;">
                             @csrf
                             @method('PUT')
                             <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas anular este reporte?')">Anular Reporte</button>
                         </form>
                         <a href="{{ route('editar_reporte_combustible', ['id' => $reporte->id]) }}" class="btn btn-warning">Editar Reporte</a>
                     @endif
                     
                     <a href="{{ route('imprimir_reporte_combustible', ['id' => $reporte->id]) }}" class="btn btn-success">Imprimir Lasser</a>
                     <a href="{{ route('imprimir_matricial_reporte_combustible', ['id' => $reporte->id]) }}" class="btn btn-info">Imprimir Matricial</a>
                 </td>
             </tr>
         @endforeach
     </tbody>
 </table>

   
@endsection
