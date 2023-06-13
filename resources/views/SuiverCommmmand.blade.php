@include('layouts.navbarhome')
<table class="table ">
    <thead>
        <tr>
            <th class="serial">#Name</th>                                          
            <th>ID commande</th>
            <th>Status</th>
            <th>detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($resultats as $C)
            <tr>
                <td>  <span class="name">{{$C->name}}</span> </td>
                <td> <span class="product">{{$C->idCom}}</span> </td>
                <td>
                    <span class="badge badge-complete">{{$C->etat}}</span>
                </td>
          <td>
            <form action="" >
            <button class="badge badge-complete" type="submit"><a href="/commade/{{$C->idCom}}">detail</a>  </button>
            </form>
         </td>
         
            </tr>
  
        @endforeach
        
        
    </tbody>
</table>

@extends('layouts.Footre')

