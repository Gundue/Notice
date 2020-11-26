
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    </head>
    <body>
        <?
        include "conn.php";
            $res = $conn->query("select * from test");
        ?>
        <form enctype="multipart/form-data" id="fm">
            <div>
                file 2
                <input type="text" name="title">
                <input type="file" name="file">
            </div>
        </form>
        <input type='file' id="imgInp" style="display:none"/>
        <img id="foo"src="/file/1605158815.png" width="50"/>
        <table>
            <thead>
                <tr>
                    <td>IDX</td>
                    <td>Title</td>
                    <td>act</td>
                    <td>rel</td>
                    <td>기타</td>
                </tr>
            </thead>
            <tbody>
            <?while($row = $res->fetch_array()){?>
                <tr>
                    <td><?=$row['idx']?></td>
                    <td><?=$row['title']?></td>
                    <td><?=$row['act_name']?></td>
                    <td><?=$row['rel_name']?></td>
                    <td><a href="/file/<?=$row['act_name']?>" download>다운로드</a></td>
                </tr>
            <?}?>
            </tbody>
        </table>
        <button class="btn">추가</button>
    </body>
    <script>
        $(document).ready(function(){
            $('#foo').click(function(){
                $('#imgInp').trigger('click');
            })
            $("#imgInp").change(function() {
                var input = this;
                console.log(input.files[0]);
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#foo').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            })
            $('.btn').click(function(){
                var formData = new FormData($('#fm')[0]);
                $.ajax({
                    url: '/formPost.php',
                    processData: false,
                    contentType: false,
                    data: formData,
                    type: 'POST',
                    dataType: 'json'
                }).done(function(result) {
                    alert("업로드 성공!!");
                    $('table tbody').append(`
                        <tr>
                            <td>${result.idx}</td>
                            <td>${result.title}</td>
                            <td>${result.act}</td>
                            <td>${result.rel}</td>
                            <td><a href="/file/${result.act}" download>다운로드</a></td>
                        </tr>
                    `)
                }).fail(function(data, textStatus, errorThrown){
                    console.log("fail data"+data);
                    console.log("fail textStatus"+textStatus);
                    console.log("fail errorThrown"+errorThrown);
                });
            })
        })
    </script>
</html>
