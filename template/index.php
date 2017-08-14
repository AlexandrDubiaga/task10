<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>task4</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
    <?php
    echo $goodDistinct;
    echo $badDistinct;
    echo $goodInnerJoin;
    echo $badDInnerJoin;
    echo $goodLeftJoin;
    echo $badLeftJoin;
    echo $goodRightJoin;
    echo $badRightJoin;
    echo $goodCross;
    echo $badCross;
    echo $goodNatural;
    echo $badNatural;
    echo $goodGroupById;
    echo $badGroupById;
    echo $goodGroup;
    echo $badGroup;
    echo $goodHaving;
    echo $badHaving;
    echo $goodOrder;
    echo $badOrder;
    echo $goodLimitById;
    echo $badLimitById;
    echo $goodUpdateLimit;
    echo $badUpdateLimit;
    echo $goodDeleteLimit;
    echo $badDeleteLimit;
    ?>
    <table class="table table-bordered">
        <tr>
            <td width="200" class="active"><a href="?distinct=x">Distinct</a></td>
            <td  style="background-color:#e2e2e2;" active">
                <?php echo $distinctSelect; ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?innerJoin=x">Inner Join</a></td>
            <td  style="background-color:silver;" class="success">
                <?php  echo $innerJoin;  ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?leftOuterJoin=x">Left Outer Join</a></td>
            <td  style="background-color:#e2e2e2;" class="success">
                <?php  echo $leftOuterJoin;  ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?rightOuterJoin=x">Right Outer Join</a></td>
            <td  style="background-color:silver;" class="success">
                <?php  echo $rightOuterJoin;  ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?crossInnerJoin=x">Cross Inner Join</a></td>
            <td  style="background-color:#e2e2e2;" class="success">
                <?php  echo $crossInnerJoin;  ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?naturalInnerJoin=x">Natural Inner Join</a></td>
            <td  style="background-color:silver;" class="success">
                <?php  echo $naturalInner;  ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?groupByIb=x">Group by id</a></td>
            <td  style="background-color:#e2e2e2;" class="success">
                <?php  echo $groupById;  ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?groupByTwoTablesId=x">Group by two tables id</a></td>
            <td  style="background-color:silver;" class="success">
                <?php  echo $groupByTwoTablesId;  ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?havin=x">Having</a></td>
            <td  style="background-color:#e2e2e2;" class="success">
                <?php  echo $havingValue;  ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?order=x">Order</a></td>
            <td  style="background-color:silver;" class="success">
                <?php  echo $orderValue;  ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?selectLimit=x">Select limit</a></td>
            <td  style="background-color:#e2e2e2;" class="success">
                <?php  echo $limitvalueFirst;  ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?updateLimit=x">Update limit</a></td>
            <td  style="background-color:silver;" class="success">
                <?php  echo $limitSecond;  ?>
            </td>
        </tr>
        <tr>
            <td class="active"><a href="?deleteLimit=x">Delete limit</a></td>
            <td  style="background-color:#e2e2e2;" class="success">
                <?php  echo $limitThird;  ?>
            </td>
        </tr>
    </table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>