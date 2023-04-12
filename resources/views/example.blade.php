<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>

    <style>
        ul {
            list-style: none;
            padding-left: 20px;
            position: relative;
        }

        ul:before {
            content: "";
            /* border-left: 1px solid black; */
            background-color: black;
            /* height: 100%; */
            position: absolute;
            left: 0px;
            width: 1px;
            bottom: 0;
            top: -1px;
        }

        ul li:before {
            content: "";
            /* border-left: 1px solid black; */
            background-color: black;
            position: absolute;
            left: -20px;
            width: 16px;
            height: 1px;
            top: 0.5em;
        }

        ul li {
            position: relative;
            margin-bottom: 8px;
            padding-left: 4px;
        }

        /* ul li:last-child:before {
            height: 50%;
            bottom: 0;
        }

        ul li:last-child:after {
            display: none;
        } */
    </style>

    <?php
    // Set the API endpoint URL
    $url = 'https://mhw-db.com/monsters?q={"type":"large"}';

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
                    <img src="/monster icon/{{$result['name']}}.png" width="100px" alt=""><br>
                    {{$result['name']}}
                </a>
            </div>
            @endforeach
        </div>
    <?php

    }

    ?>
    <div>
        <table>
            <thead>
                <tr>
                    <th></th>
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

        let leading_spaces_records = [];
        let largest_leading_spaces = 0;
        let binding = [];

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

            leading_spaces_records.push([index, leading_spaces]);
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

                leading_spaces_records.push([index, leading_spaces]);

                if (largest_leading_spaces > leading_spaces) {
                    let target_leading_spaces = leading_spaces;

                    // console.log("largest_leading_spaces",largest_leading_spaces);
                    // console.log("leading_spaces",leading_spaces);
                    // console.log("target_leading_spaces",target_leading_spaces);

                    // console.log("leading_spaces_records", leading_spaces_records);
                    leading_spaces_records.forEach((leading_spaces_record) => {
                        //console.log("leading_spaces_record", leading_spaces_record);
                        if (leading_spaces_record[1] > target_leading_spaces) {
                                let target_line_add = rows[leading_spaces_record[0]].textContent;
                                console.log(target_line_add);
                                rows[leading_spaces_record[0]].textContent = target_line_add.slice(0, target_leading_spaces) + "┃ " + target_line_add.slice(target_leading_spaces);
                        }

                    });
                    leading_spaces_records = [];
                    largest_leading_spaces = 0;

                }else{
                    //leading_spaces_records.push([index, leading_spaces]);
                }

                // let binding = [];
                // leading_spaces_records.forEach((leading_spaces_record) => {
                //     let start_target_line_index = null;
                //     let end_target_line = rows[index -1];
                //     if(leading_spaces_record[1]==leading_spaces){
                //         start_target_line = leading_spaces_record[0] + 1;
                //     }
                //     rows[start_target_line[0]].textContent = end_target_line.slice(0, leading_spaces) + "┃ " + end_target_line.slice(leading_spaces);
                // });
            }



        });
    </script>
</body>

</html>
