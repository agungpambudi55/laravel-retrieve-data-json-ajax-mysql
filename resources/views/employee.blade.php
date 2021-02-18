<!DOCTYPE html>
<html>
<head>
    <title>Project</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <button id="refresh">Refresh</button>
    <button id="save">Save</button>

    <table id="table_employee" border="1">
        <thead>
            <tr>
                <td>ID Pegawai</td>
                <td>Nama Pegawai</td>
                <td>Usia</td>
                <td>Gaji Pegawai</td>
                <td>Foto</td>
            </tr>
        </thead>
    </table>

    <script type="text/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        let data = [];
        
        function fetch() {
            axios.get('http://static.sekawanmedia.co.id/data.json').then(result => {
                $('tr[id*=temp]').remove();
                data = result.data.data
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
        }
        
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