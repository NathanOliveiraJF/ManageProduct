@section('title', 'Categoria')
<a href="#" class="">Criar Categoria</a>

<table>
    <thead>
    <tr>
        <td>#</td>
        <td>Nome</td>
        <td>Ações</td>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>

            <td >
                <a href="#">Editar</a>
                <form method="POST">
                    <button type="submit">Apagar</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>

