<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('/css/css.css') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>

    <style>
        
    </style>

    <?php
    // Set the API endpoint URL
    $url = 'https://mhw-db.com/monsters';

    // Fetch the JSON data from the API endpoint
    $json_data = file_get_contents($url);

    // Decode the JSON data into a PHP array
    $data = json_decode($json_data, true);

    // Check if the JSON data was successfully decoded
    if ($data === null) {
        // Handle the decoding error
        echo "Error decoding JSON data";
    } else {
        // Process the data
        // ..
    ?>
        <div class="row">
            @foreach($data as $result)
            <div class="col-sm-2 text-center">
                <a href="#?id={{$result['id']}}" class="text-decoration-none">
                    <img src="/img/monster icon/{{$result['name']}}.png" width="100px" alt=""><br>
                    {{$result['name']}}
                </a>
            </div>
            @endforeach
        </div>
    <?php

    }

    ?>
    <div>
        <table class="table table-dark table-striped table-hover">
            <thead style="border-bottom-color: black;">
                <tr>
                    <th>Weapon</th>
                    <th class="text-center">Rarity</th>
                    <th class="text-center">Attack</th>
                    @if($type!="light-bowgun" && $type!="heavy-bowgun")
                        <th class="text-center">Elements</th>
                    @endif
                    @if($type!="bow" && $type!="light-bowgun" && $type!="heavy-bowgun")
                        <th class="text-center">Sharpness</th>
                    @elseif($type =="heavy-bowgun")
                        <th class="text-center">Special Ammo</th>
                    @elseif($type=="bow")
                        <th class="text-center">Coatings</th>
                    @endif
                    @if($type=="charge-blade" || $type =="switch-axe")
                        <th class="text-center">Phial</th>
                    @endif  
                    <th class="text-center">Slots</th>
                    <th class="text-center">Attributes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                echo $weaponTree;
                ?>

            </tbody>
        </table>
    </div>
    <script>
        // 获取行元素列表
        let rows = document.querySelectorAll('.weaponRow');
        let largest_leading_spaces = 0;

        // 遍历每一行元素并检查前面的空格数和下一行是否存在
        rows.forEach((row, index) => {
            let line = row.textContent;
            let leading_spaces = line.length - line.trimLeft().length;
            let next_line = null;
            let next_line_leading_spaces = null;
            if (rows[index + 1]) {
                next_line = rows[index + 1].textContent;
                next_line_leading_spaces = next_line.length - next_line.trimLeft().length;
            }

            if (largest_leading_spaces < leading_spaces) {
                largest_leading_spaces = leading_spaces;
            }

            // 根据前导空格数和下一行的存在性添加适当的前缀
            if (leading_spaces >= 1) {

                // 查找第一个非空白字符的位置
                const line_first_char_index = line.search(/\S/);
                // 将前缀添加到第一个非空白字符之前
                if (leading_spaces === next_line_leading_spaces) {
                    row.textContent = line.slice(0, line_first_char_index) + "┣ " + line.slice(line_first_char_index);
                } else {
                    row.textContent = line.slice(0, line_first_char_index) + "┗ " + line.slice(line_first_char_index);
                }

                if (largest_leading_spaces > leading_spaces) {

                    let pid = parseInt(row.getAttribute("data-pid"));
                    let pid_row_index = $("tr[data-id='" + pid + "']").index()+1;

                    if (pid) {
                        for (let i = pid_row_index; i < index; i++) {
                            let target_line_add = rows[i].textContent;
                            if (target_line_add.slice(leading_spaces).charAt(0) == "┗") {
                                rows[i].textContent = target_line_add.slice(0, leading_spaces) + target_line_add.slice(leading_spaces).replace("┗", "┣");

                            } else if (target_line_add.slice(leading_spaces).charAt(0) != "┃" && target_line_add.slice(leading_spaces).charAt(0) != "┣") {
                                rows[i].textContent = target_line_add.slice(0, leading_spaces) + "┃ " + target_line_add.slice(leading_spaces);
                            }
                            console.log(target_line_add.slice(leading_spaces).charAt(0));
                        }
                    }
                }
            }

        });
    </script>
</body>

</html>