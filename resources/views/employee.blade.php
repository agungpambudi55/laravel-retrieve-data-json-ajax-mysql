<!DOCTYPE html>
<html>
<head>
    <title>Project</title>
    <meta name="description" content="Bootstrap.">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css"> -->
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script> -->
</head>
<body>
    <button id="refresh">Refresh</button>
    <button id="save">Save</button>

    <table id="table_employee">
        <thead>
            <tr>
                <td>ID Pegawai</td>
                <td>Nama Pegawai</td>
                <td>Usia</td>
                <td>Gaji Pegawai</td>
                <td>Foto</td>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td>ID Pegawai</td>
                <td>Nama Pegawai</td>
                <td>Usia</td>
                <td>Gaji Pegawai</td>
                <td>Foto</td>
            </tr>
        </tfoot>
    </table>

    <script type="text/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" charset="utf-8">
        let data = [];
        
        function fetch() {
            axios.get('http://static.sekawanmedia.co.id/data.json').then(result => {
                $('tr[id*=temp]').remove();
                data = result.data.data;
                result.data.data.map(item => {
                    $('#table_employee').append(
                        '<tr id="temp_'+item.id+'">'+
                            '<td>'+item.id+'</td>'+
                            '<td>'+item.employee_name+'</td>'+
                            '<td>'+item.employee_age+'</td>'+
                            '<td>'+item.employee_salary+'</td>'+
                            '<td><img src="'+item.profile_image+'" alt="Foto"></td>'+
                        '</tr>');
                });
            }).catch(error => {
                alert("Data gagal diambil!");
            });
        };

        $(document).ready(function() {
            fetch(); 
            
            $("#refresh").click(function() {
                fetch();
            });
        
            $("#save").click(function() {
                axios.post('/api/save', {
                    req: data,
                    count: data.length
                }).then(result => {
                    alert("Data berhasil disimpan!");
                }).catch(error => {
                    alert("Data gagal disimpan!");
                });
            });
        });   
    </script>
</body>
</html>