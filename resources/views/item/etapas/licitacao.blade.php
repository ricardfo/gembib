<form method="POST" action="/processar_licitacao/{{$item->id}}">
@csrf 
<div>
    @include('item.observacao') 
    <p>Enviado para {{$item->status}} 
    @include('item.partials.alterado_por')
    em {{$item->updated_at}}.
    </p>
    <button type="submit" name="processar_licitacao" class="btn btn-info" value="Em Tombamento" onclick="return confirm('Mudar status para Em Tombamento?')">Começar Tombamento</button>
</div>
</form>