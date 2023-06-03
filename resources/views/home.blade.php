<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<div class="center-div">
    <div>
        <a href="{{ route('entite_social.index') }}">
            <button type="submit" class="btn btn-primary">Entity Sociale</button>
        </a>
    </div>
    <div>
        <a href="{{ route('contrats') }}">
            <button type="submit" class="btn btn-success">Contracts Active</button>
        </a>
    </div>
    <div>
        <a href="{{ route('entite_physique.index') }}">
            <button type="submit" class="btn btn-primary">Entity Physique</button>
        </a>
    </div>
    <div>
        <a href="{{ route('clientInfos') }}">
            <button type="submit" class="btn btn-success">Client Informations</button>
        </a>
    </div>
</div>















<style>
    .center-div {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        display: flex;
        margin-top: 250px;
    }

    .btn {
        margin-left: 50px;
        margin-right: 200px;
        margin-top: -80px;
    }

</style>