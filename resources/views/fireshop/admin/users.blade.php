@include('fireshop.admin.nav')

<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Orders </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <div class="search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-input" placeholder="Search by name...">
                                <button class="btn btn-primary" onclick="searchTable()"><i class="ti-search"></i></button>
                            </div>
                        </div>                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="avatar">Avatar</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>
                                        role
                                    </th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>#{{$user->id}}</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td><span class="name">{{$user->name}}</span></td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->is_admin==0)
                                        user
                                        @endif
                                        @if ($user->is_admin==1)
                                        admin
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route("deleteUser", ['user' => $user->id]) }}" class="btn btn-danger">Supprimer</a>
                                        @if ($user->is_blocked==0)
                                        <form action="{{ route('blockUser', ['id' => $user->id]) }}" method="post" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="ti-lock"></i></button>
                                        </form>
                                        @endif
                                        @if ($user->is_blocked==1)
                                        <form action="{{ route('unlockUser', ['id' => $user->id]) }}" method="post" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-warning"><i class="ti-unlock"></i></button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div>  <!-- /.col-lg-8 -->

        
    </div>
</div>

<script>
    function searchTable() {
        // Récupérer la valeur saisie dans le champ de recherche
        var input = document.getElementById("search-input");
        var filter = input.value.toUpperCase();

        // Récupérer les lignes de la table
        var table = document.querySelector(".table");
        var rows = table.getElementsByTagName("tr");

        // Parcourir les lignes et masquer celles qui ne correspondent pas à la recherche
        for (var i = 0; i < rows.length; i++) {
            var nameColumn = rows[i].querySelector(".name");
            if (nameColumn) {
                var name = nameColumn.textContent || nameColumn.innerText;
                if (name.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }
</script>


<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>