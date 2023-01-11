<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    let arr_size;

    function random_arr() {
        arr_size = Number(prompt('Введите размер массива'));
        if (!arr_size || arr_size <= 0) {
            alert('Некорректный ввод');
            return 0;
        }
        $('#create').prop("disabled", true);

        $.ajax({
            url: "randomize.php",
            type: "POST",
            cache: false,
            async: false,
            data: {"size": arr_size},
            dataType: "html",
            success: function (data) {
                $('#create').prop("disabled", false);
                $('#sort').prop("disabled", false);
            }

        });
    }

    function getval(arr_key) {
        let result;
        $.ajax({
            url: "getval.php",
            type: "POST",
            cache: false,
            async: false,
            data: {"arr_key": arr_key},
            dataType: "html",
            success: function (data) {
                result = parseInt(data);
            }
        });
        return result;
    }

    function swap(arr_key_1, arr_key_2) {
        $.ajax({
            url: "swap.php",
            type: "POST",
            cache: false,
            async: false,
            data: {
                "arr_key_1": arr_key_1,
                "arr_key_2": arr_key_2
            },
            dataType: "html",
            success: function (data) {
            }
        });
    }

    function bblSort(arr_key) {
        for (arr_key = 0; arr_key < arr_size; arr_key++) {
            if (getval(arr_key) > getval(arr_key + 1)) {
                swap(arr_key, arr_key + 1);
            }
        }
    }

    function Sort(){
        $("#sort").prop("disabled",true);
        $("#create").prop("disabled", true);

        for (let i = 0;i < arr_size;i++){
            bblSort(i);
        }
        alert("success");
        $("#create").prop("disabled", false);
    }



</script>
<html lang="ru">
<head>
    <title>Sorting Array</title>
</head>
<body>
<div>
    <div>
        <button type="button" id="create" onclick="random_arr()">Create random array</button>
        <button type="button" id="sort" onclick="Sort()">Sort Array</button>
    </div>
</div>
<div id="result"></div>
</body>
</html>