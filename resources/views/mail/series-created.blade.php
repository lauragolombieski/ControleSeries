@component('mail::message')
    
 # Uma nova série foi criada com sucesso! 

    - {!!$nomeSerie!!} com {{$qtdTemp}} temporadas e {{$qtdEpisodios}} episódios por temporada!
<br>
  Acesse aqui: 
    
@component ('mail::button', ['url' => route('seasons.index', $idSerie)])
Ver série
@endcomponent

@endcomponent