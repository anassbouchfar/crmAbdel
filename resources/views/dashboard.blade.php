@extends('herite')
@section('statistique')
<?php
 

 function age($date)
{
  return (int) ((time() - strtotime($date)) / 3600 / 24 / 365);
}
?>

                      <div class="content-wrapper">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                          <a class="navbar-brand" href="#">Admin</a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                        
                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                <a class="nav-link" href="{{route('dashboard')}}">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                <div class="dropdown show">
                                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Notification <span class="badge badge-light"><?php $i=0; foreach($notification as $noti)
                                    {
                                      $i=$i+1;
                                    }
                                    echo $i; ?>
          
                                    </span>
                                  </a>
                                
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @foreach($notification as $noti)
                                    <a class="dropdown-item" href="#">{{$noti['nom']}} {{$noti['prenom']}} <strong> {{$noti['status']}}</strong> </a>
                                    @endforeach 
                                  </div>
                                 
                                </div>
                              </li>
                              




                              
                            
                                </form>
                              
                            </ul>
                            <form class="form-inline my-2 my-lg-0" action="{{route('cherchertelephone')}}">
                              <input name='télephone' class="form-control mr-sm-2" type="search" placeholder="Télephone" aria-label="Search">
                              <button type="submit" class="btn btn-outline-success my-2 my-sm-0" type="submit">chercher</button>
                            </form>
                          </div>
                        </nav>
                      <div class="page-header">
                        <h3 class="page-title">
                          <span class="page-title-icon bg-gradient-primary text-white mr-2">
                            
                            <i class="mdi mdi-home"></i>
                          </span> Dashboard </h3>
                          
                        <nav aria-label="breadcrumb">
                          <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                              <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                          </ul>
                        </nav>
                      </div>
                      
                      <br>
                      
                    <br>
                      <div class='container border'>
                      <div class="row">
                        <form action="{{route('statistique')}}">
                          <p class="text-monospace">Quelle compagne?</p>
                          <div class="form-check">
                            <input name='a'class="form-check-input" type="checkbox" value="a" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                              A
                            </label>
                          </div>
                          <div class="form-check">
                            <input name='b' class="form-check-input" type="checkbox" value="b" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                              B
                            </label>
                          </div>
                          <div class="form-check">
                            <input name='c' class="form-check-input" type="checkbox" value="c" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                              C
                            </label>
                           
                          </div>
                          <button type='submit' class="btn btn-success">Voir statistique</button>
                          
                          </form>
                      </div>
                    </div>
                      <br>
                      <div class="row">
                        
                        
                        <div class="col-md-3 stretch-card grid-margin" style=" height: 195px;">
                          <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                              <h4 class="font-weight-normal mb-2">C.A <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-3">{{$CA}}£</h2>
                              <h6 class="card-text">--%</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 stretch-card grid-margin" style=" height: 195px;">
                          <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                              <h4 class="font-weight-normal ">Prime <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">{{$prime}}£</h2>
                              
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-2 stretch-card grid-margin " style=" height: 195px;">
                          <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">
                              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                              <h4 class="font-weight-normal mb-3">Nombre d'appel<i class="mdi mdi-diamond mdi-24px float-right"></i>
                              </h4>
                            <h2 class="mb-5">{{$nombre}}</h2>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 stretch-card grid-margin" style=" height: 195px;">
                          <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">
                              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                              <h4 class="font-weight-normal mb-3">Taux de Validation<i class="mdi mdi-diamond mdi-24px float-right"></i>
                              </h4>
                            <h4 class="mb-5">A:{{$ta}}%  B:{{$tb}}%  C:{{$tc}}%</h4>
                            
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin" style=" height: 195px;">
                            <div class="card bg-gradient-success card-img-holder text-white">
                              <div class="card-body">
                                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Objectif<i class="mdi mdi-diamond mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5">10000£</h2>
                                
                              </div>
                            </div>
                          </div>
                      </div>




@endsection























































@section('list')

@if(session()->has('status'))
<h3 style='text-align:center;' class="alert alert-danger" role="alert">{{session()->get('status')}}</h3>
@endif
<div class="row">


<div class="col-sm" style="height:200px;width: 200px;">
        <div class="alert alert-primary" >
          chercher par nom:
        </div>
          <form action="{{route('chercher')}}">

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Entrer le nom:</label>
              <input name='nom'type="text" class="form-control" id="recipient-name" >
              <div>
                <div class="modal-footer">
                <button  class="btn btn-success" type="submit"> Trouver</button>
              </div>
              
            </div>

          </form>
          
</div>

</div>
<div class="col-sm">
<div class="alert alert-primary" role="alert">
  veuillez choisir votre status
</div>

<form action="{{route('filtrer')}}" method='GET'>
<div>
  
  <label value="{{ old('status') }}" for="status">  <strong> Status :</strong> </label>
  <SELECT class="browser-default custom-select" name="status" size="1" >
    <option value="tout">tout</option>
    <option value="nrp">nrp</option>
    <option value="cali">cali</option>
    <option value="refus">refus</option>
    <option value="ok">ok</option>
    <option value="fn">fn</option>
    <option value="doublant">doublant</option>
    <option value="rdv">rdv</option>
    <option value="rappel">rappel</option>
    <option value="promesse">promesse</option>
    <option value="chute">chute</option>
    <option value="non">a ne pas rappeler</option>
    <option value="inj">inj</option>
  </SELECT>
  <div>
  <label for="compagne"><strong> Compagne :</strong></label>
  <SELECT name="compagne" size="1" >
    <option value="a">A</option>
    <option value="b">B</option>
    <option value="c">C</option>
    
  </SELECT>
</div>
</div>
<div class="modal-footer">
    <button  class="btn btn-success" type="submit"> chercher</button>
</div>   
</form>
                      </div>

@endsection
@section('telephone')

 
@endsection

@section('content')



@foreach ($clients as $client)
<tr>
           
<td>
                                      {{$client->civilité}} 
                                       
                                      </td>
                                      <script>

                                        $('.popover-dismiss').popover({
                                          trigger: 'focus'
                                        })
                                                                                  </script>
                                      <td> {{$client->nom}} </td>
                                      <td> {{$client->prénom}} </td>
                                      <td> {{$client->email}} </td>
                                      <td> {{$client->télephone}} </td>
                                      <td> {{$client->cotisation}} </td>
                                      <td > 
                                        @if($client->status=="nrp")
                                        <p style='background-color: #FFD700; text-align:center;'> <strong> nrp</strong>  </p>
                                        
                                          
                                        
                                        @endif
                                        @if($client->status=="cali")
                                        <p style='background-color: #DCDCDC; text-align:center;'>  <strong> cali</strong>  </p>
                                        @endif
                                        @if($client->status=="refus")
                                        <p style='background-color: #FF69B4; text-align:center;'> <strong> refus</strong>  </p>
                                        @endif
                                        @if($client->status=="ok")
                                        <p style='background-color: #008000; text-align:center;'> <strong> ok</strong>  </p>
                                        @endif
                                        @if($client->status=="fn")
                                        <p style='background-color: #000000; text-align:center;'> <strong> fn</strong>  </p>
                                        @endif
                                        @if($client->status=="doublant")
                                        <p > doublant </p>
                                        @endif
                                        @if($client->status=="rdv")
                                        <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title={{$client->date_status}}>
                                          rdv
                                        </button>
                                        @endif
                                        @if($client->status=="rappel")
                                        <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title={{$client->date_status}}>
                                          rappel
                                        </button>
                                        @endif
                                        @if($client->status=="promesse")
                                        <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title={{$client->date_status}}>
                                          promesse
                                        </button>
                                        @endif
                                        @if($client->status=="a ne pas rappeler")
                                        <p style='background-color: #000000; text-align:center;'> <strong> à ne pas rappeler</strong> </p>
                                        @endif
                                        @if($client->status=="chute")
                                        <p style='background-color: #000000; text-align:center;'> <strong> chute</strong>  </p>
                                        @endif
                                        @if($client->status=="inj")
                                        <p style='background-color: red; text-align:center;'> inj </p>
                                        @endif

                                        
                                        
                                         </td>
                                         <td>{{$client->régime}}</td>
                                      <td> 

                                        @foreach($assurances as $assurance)
                                                        @if($client->assurance_actuelle==$assurance->id)
                                                        {{$assurance->assurance}}
                                                       
                                                        @endif

                                                       @endforeach

                                      </td>
                                      <td> 
                                        @foreach($assurances as $assurance)
                                        @if($client->assurance_vendu==$assurance->id)
                                        {{$assurance->assurance}}
                                       
                                        @endif

                                       @endforeach  
                                      
                                      
                                      </td>
                                      <td> 
                                        <form method='GET' action={{route('add_commentaire')}}>
                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$client->nom}}{{$client->prénom}}{{$client->id}}" data-whatever="@mdo">Commentaire</button>
                                        <div class="modal fade" id={{$client->nom}}{{$client->prénom}}{{$client->id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document" >
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Commentaire</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                               
                                              </div>
                                              <div class="alert alert-primary" style='text-align:center;'role="alert">
                                                Nom et Prénom :<a href="#" class="alert-link">{{$client->nom}} {{$client->prénom}}</a>
                                               </div>
                                              <div class="modal-body">
                                                @foreach($commentaires as $commentaire)
                                                  @if($commentaire->client_id==$client->id)
                                                  
                                                  <div class="form-group">
                                                  <label for="message-text" class="col-form-label">le:{{$commentaire->created_at}}</label>
                                                    <label class="form-control" id="message-text"> {{$commentaire->commentaire}}</label>
                                                    
                                                  </div>
                                                  @endif
                                                @endforeach
                                                
                                              <input name='id' type="hidden" value={{$client->id}}>
                                              <div class="form-group">
                                                <label for="message-text" class="col-form-label"><strong> Nouveau Commentaire</strong></label>
                                                  <textarea name='commentaire' class="form-control" id="message-text"></textarea>
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </form>
                                      
                                      
                                      
                                      
                                      </td>
                                      <td> {{$client->ville}} </td>
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      <td>
                                        <form action='{{route('update')}}' method='GET'>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$client->nom}}{{$client->prénom}}" data-whatever="@getbootstrap">Ouvrir</button>
                                        <div class="modal fade" id={{$client->nom}}{{$client->prénom}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document" style='margin-left: 359px;'>

                                            <div class="modal-content" style="width: 720px;">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> Client : {{$client->nom}} {{$client->prénom}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <input name='id'type="hidden" class="form-control" id="recipient-name" value={{$client->id}}>
                                                <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                    <label for="inputEmail4">nom</label>
                                                    <input name="nom"type="" class="form-control" id="inputEmail4" placeholder="nom" value={{$client->nom}}>
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Prénom</label>
                                                    <input name="prénom"type="" class="form-control" id="inputEmail4" placeholder="nom" value={{$client->prénom}}>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputAddress">Addresse</label>
                                                  <input name="adresse"type="text" class="form-control" id="inputAddress" placeholder="adresse" value={{$client->adresse}}>
                                                </div>
                                                
                                                <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                    <label for="inputCity">Ville</label>
                                                    <input name="ville"type="text" class="form-control" id="inputCity" value={{$client->ville}}>
                                                  </div>
                                                  
                                                  <div class="form-group col-md-2">
                                                    <label for="inputZip">Zip</label>
                                                    <input name="codepostal"type="text" class="form-control" id="inputZip" value={{$client->codepostal}}>
                                                  </div>
                                                  <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                      <label for="inputEmail4">Date Naissance</label>
                                                      <input name="date_naissance"type="" class="form-control" id="inputEmail4" placeholder="nom" value={{$client->date_naissance}}>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label for="inputPassword4">Age</label>
                                                      <input name="age"type="" class="form-control" id="inputEmail4" placeholder="nom" value=<?php echo age($client->date_naissance); ?> disabled>
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                                  
                                                
                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">email:</label>
                                                    <input name='email'type="text" class="form-control" id="recipient-name"  value={{$client->email}}> 
                                                  </div>



                                                  <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                      <label for="inputEmail4">Cotisation</label>
                                                      <input name="cotisation"type="" class="form-control" id="inputEmail4" placeholder="nom" value={{$client->cotisation}}>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label for="inputPassword4">Status Actuelle</label>
                                                      
                                                      @if($client->status=="rappel" || $client->status=="rdv" || $client->status=="promesse")
                                                      <input type="" class="form-control" id="inputEmail4" placeholder="nom" value={{$client->status }}{{$client->date_status}} disabled>
                                                    
                                                    @else
                                                    <input type="" class="form-control" id="inputEmail4" placeholder="nom" value={{$client->status}} disabled >
                                                    @endif
                                                    </div>
                                                  </div>
                                               
                                                  
                                                  <div class="form-group">
                                                    
                                                    <label for="recipient-name" class="col-form-label">Changer status :</label><br>
                                                    <SELECT class="browser-default custom-select" name="status" size="1" >
                                                      
                                                      <option value="nrp">nrp</option>
                                                      <option value="cali">cali</option>
                                                      <option value="refus">refus</option>
                                                      <option value="ok">ok</option>
                                                      <option value="fn">fn</option>
                                                      <option value="doublant">doublant</option>
                                                      <option value="rdv">rdv</option>
                                                      <option value="rappel">rappel</option>
                                                      <option value="promesse">promesse</option>
                                                      <option value="chute">chute</option>
                                                      <option value="non">a ne pas rappeler</option>
                                                      <option value="inj">inj</option>
                                                    </SELECT>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label"> <strong> Assurance vendu: </strong> </label>
                                                    
                                                    <br>
                                                    
                                                    <SELECT class="browser-default custom-select" name="assurance_vendu" size="1" >
                                                      
                                                      @foreach($assurances as $assurance)
                                                        @if($client->assurance_vendu==$assurance->id)
                                                        <option selected value={{$assurance->id}}>{{$assurance->assurance}}</option>
                                                        @else
                                                        <option  value={{$assurance->id}}>{{$assurance->assurance}}</option>
                                                        @endif

                                                       @endforeach     
                                                    </SELECT>


















                                                  </div>
                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label"> <strong>Assurance actuelle:</strong></label>
                                                    <br>
                                                    <SELECT class="browser-default custom-select" name="assurance_actuelle" size="1" >
                                                      
                                                      @foreach($assurances as $assurance)
                                                        @if($client->assurance_actuelle==$assurance->id)
                                                        <option selected value={{$assurance->id}}>{{$assurance->assurance}}</option>
                                                        @else
                                                        <option  value={{$assurance->id}}>{{$assurance->assurance}}</option>
                                                        @endif

                                                       @endforeach     
                                                    </SELECT>

                                                  </div>
                                                  <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                      <label for="inputEmail4">IBAN</label>
                                                      <input name="iban"type="" class="form-control" id="inputEmail4" placeholder="nom" value={{$client->iban}}>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label for="inputPassword4">Sécurité Sociale</label>
                                                      <input name="ss"type="" class="form-control" id="inputEmail4" placeholder="nom" value={{$client->ss}}>
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Régime:</label>
                                                    <input name='regime' type="text" class="form-control" id="recipient-name" value={{$client->régime}} >
                                                  </div>
                                                  <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                      <label for="inputEmail4">Télephone</label>
                                                      <input name="telephone"type="" class="form-control" id="inputEmail4" placeholder="nom" value={{$client->télephone}}>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label for="inputPassword4">Télephone 1</label>
                                                      <input name="telephone1"type="" class="form-control" id="inputEmail4" placeholder="nom" value={{$client->télephone1}}>
                                                    </div>
                                                  </div>
                                                  <div>
                                                    
                                                  
                                                  </div>
                                                  <!--div class="modal-footer"-->
                                                    <!--button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button-->
                                                    <button type='submit' class="btn btn-primary">Enregistrer</button>
                                                  </div>
                                                </form>
                                              </div>
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                      <form action="{{route('add_associe')}}">
                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$client->nom}}{{$client->prénom}}{{$client->nom}}">
                                            +
                                          </button>
                                          <div class="modal fade" id={{$client->nom}}{{$client->prénom}}{{$client->nom}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Ajouter Associé à {{$client->nom}} {{$client->prénom}}</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                      <label for="inputPassword4">Civilité</label>
                                                      <select  name="civilité_associe"class="form-control form-control-sm">
                                                        <option>Mr</option>
                                                        <option>Mme</option>
                                                      </select>

                                                    </div>
                                                    <div class="form-group col-md-4">
                                                      <label for="inputEmail4">Nom</label>
                                                      <input name="nom_associe"type="" class="form-control" id="inputEmail4" placeholder="nom" value="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                      <label for="inputPassword4">Prénom</label>
                                                      <input name="prenom_associe"type="" class="form-control" id="inputEmail4" placeholder="nom" value="">
                                                    </div>
                                                  </div>
                                                  <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                      <label for="inputEmail4">Sécurité Sociale</label>
                                                      <input name="ss_associe"type="" class="form-control" id="inputEmail4" placeholder="nom" value="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label for="inputPassword4">Régime</label>
                                                      <input name="regime_associe"type="" class="form-control" id="inputEmail4" placeholder="nom" value="">
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="sumbit" class="btn btn-primary">Save changes</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                      </td>
                                    

                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                      




                                    





                                  </tr>   
                                  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
                                  <script>
                                    $(()=>{
                                      $(".addChild").click(()=>{
                                        str =' <div class="form-row">\
                                                                                    <div class="form-group col-md-6">\
                                                                                      <label for="inputEmail4">nom</label>\
                                                                                      <input name="iban"type="" class="form-control" id="inputEmail4" placeholder="nom" >\
                                                                                    </div>\
                                                                                    <div class="form-group col-md-6">\
                                                                                      <label for="inputPassword4">prénom</label>\
                                                                                      <input name="ss"type="" class="form-control" id="inputEmail4" placeholder="nom" >\
                                                                                    </div>\
                                                                                  </div>\
                                                                                  <div class="form-row">\
                                                                                    <div class="form-group col-md-6">\
                                                                                      <label for="inputEmail4">IBAN</label>\
                                                                                      <input name="iban"type="" class="form-control" id="inputEmail4" placeholder="nom" >\
                                                                                    </div>\
                                                                                    <div class="form-group col-md-6">\
                                                                                      <label for="inputPassword4">Sécurité Sociale</label>\
                                                                                      <input name="ss"type="" class="form-control" id="inputEmail4" placeholder="nom" >\
                                                                                    </div>\
                                                                                    <div class="form-group col-md-6">\
                                                                                    <label for="inputPassword4">Régime</label>\
                                                                                    <input name="ss"type="" class="form-control" id="inputEmail4" placeholder="nom" >\
                                                                                  </div>\
                                                                                  </div>'
                                                                                  
                                        $(".contChilds").append(str)
                                      })
                                    })
                                  </script>
                                  
                                  
                                 
                                      @endforeach
                                      

@endsection
