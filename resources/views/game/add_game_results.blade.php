<!DOCTYPE html>
<html>
<head>
    <title>Add Game Results</title>
    <script>
        let count = 1;

        function addRow() {
            if (count >= 10) return;

            const table = document.getElementById("inputTable");
            const row = table.insertRow(-1);
            const cells = [];

            for (let i = 0; i < 4; i++) {
                cells.push(row.insertCell(i));
            }

            const teams = ["김비스콘", "승비스콘", "지비스콘", "문비스콘"];
            const select1 = document.createElement("select");
            const select2 = document.createElement("select");

            select1.name = `gameResults[${count}][team1]`;
            select2.name = `gameResults[${count}][team2]`;

            teams.forEach(team => {
                select1.add(new Option(team, team));
                select2.add(new Option(team, team));
            });

            cells[0].appendChild(select1);
            cells[1].appendChild(select2);

            const input1 = document.createElement("input");
            input1.type = "number";
            input1.name = `gameResults[${count}][team1_score]`;
            cells[2].appendChild(input1);

            const input2 = document.createElement("input");
            input2.type = "number";
            input2.name = `gameResults[${count}][team2_score]`;
            cells[3].appendChild(input2);

            count++;
        }

        function validateAndSubmit() {
            const inputs = document.querySelectorAll('input[type="number"]');
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i].value === "") {
                    inputs[i].focus();
                    alert("모든 값을 입력해주세요.");
                    return;
                }
            }
            document.forms[0].submit();
        }

        window.onload = function() {
            addRow();
        }
    </script>
</head>
<body>
    <h1>Add Game Results</h1>
    <form action="/save-game-results" method="post">
        @csrf
        <button type="button" onclick="addRow()">+</button>
        <table id="inputTable" border="1">
            <tr>
                <th>Team 1</th>
                <th>Team 2</th>
                <th>Team 1 Score</th>
                <th>Team 2 Score</th>
            </tr>
        </table>
        <button type="button" onclick="validateAndSubmit()">Save</button>
    </form>
    <!-- /win-rate로 이동하는 버튼 추가 -->
    <button onclick="window.location.href='/win-rate'">Go to Win Rate</button>
</body>
</html>
