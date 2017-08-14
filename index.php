<?php
include ('config.php');
include ('libs/SQL.php');
$connect = new Sql();
switch (true)
{
    case isset($_GET['distinct']):
        $values = array('key','data');
        $distinctSelect = $connect->selectDistinct($values)->from(FIRST)->exec();
        if($distinctSelect)
        {
            $goodDistinct = GOOD_DISTINCT;
        }else
        {
            $badDistinct = BAD_DISTINCT;
        }
    break;
    case isset($_GET['innerJoin']):
        $values = array('key','data');
        $innerJoin =  $connect->select($values)->from(FIRST)->innerJoin(SECOND,SECOND.'.key',FIRST.'.key')->exec();
        if($innerJoin)
        {
            $goodInnerJoin = GOOD_INNER_JOIN;
        }else
        {
            $badDInnerJoin = BAD_INNER_JOIN;
        }
        break;
    case isset($_GET['leftOuterJoin']):
        $values = array('key','data');
        $leftOuterJoin = $connect->select($values)->from(FIRST)->leftOuterJoin(SECOND,SECOND.'.key',FIRST.'.key')->exec();
        if($leftOuterJoin)
        {
            $goodLeftJoin = GOOD_LEFT_OUTER_JOIN;
        }else
        {
            $badLeftJoin = BAD_LEFT_OUTER_JOIN;
        }
        break;
    case isset($_GET['rightOuterJoin']):
        $values = array('key','data');
        $rightOuterJoin = $connect->select($values)->from(FIRST)->rightOuterJoin(SECOND,SECOND.'.key',FIRST.'.key')->exec();
        if($rightOuterJoin)
        {
            $goodRightJoin = GOOD_RIGHT_OUTER_JOIN;
        }else
        {
            $badRightJoin = BAD_RIGHT_OUTER_JOIN;
        }
        break;
    case isset($_GET['crossInnerJoin']):
        $values = array('key','data');
        $crossInnerJoin = $connect->select($values)->from(FIRST)->crossJoin(SECOND)->exec();
        if($crossInnerJoin)
        {
            $goodCross = GOOD_CROSS_JOIN;
        }else
        {
            $badCross = BAD_CROSS_JOIN;
        }
        break;
    case isset($_GET['naturalInnerJoin']):
        $values = array('key','data');
        $naturalInner = $connect->select($values)->from(FIRST)->naturalJoin(SECOND)->exec();
        if($naturalInner)
        {
            $goodNatural = GOOD_NATURAL_JOIN;
        }else
        {
            $badNatural = BAD_NATURAL_JOIN;
        }
        break;
    case isset($_GET['groupByIb']):
        $values = array('key','data');
        $groupById = $connect->select($values)->from(FIRST)->group('key')->exec();
        if($groupById)
        {
            $goodGroupById = GOOD_GROUP_ID;
        }else
        {
            $badGroupById = BAD_GROUP_ID;
        }
        break;
    case isset($_GET['groupByTwoTablesId']):
        $valuesGroup = array('MY_TEST.key','SECOND_TEST.data');
        $groupByTwoTablesId = $connect->select($valuesGroup)->from(FIRST,SECOND,',')
            ->where(FIRST.'.key',SECOND.'.key')->group(FIRST.'.key')->exec();
        if($groupByTwoTablesId)
        {
            $goodGroup = GOOD_GROUP;
        }else
        {
            $badGroup = BAD_GROUP;
        }
        break;
    case isset($_GET['havin']):
        $values = array('key','data');
        $havingValue = $connect->select($values)->from(FIRST)->group('key')->having('AVG(\'key\')')->exec();
        if($havingValue)
        {
            $goodHaving = GOOD_HAVING;
        }else
        {
            $badHaving = BAD_HAVING;
        }
        break;
    case isset($_GET['order']):
        $values = array('key','data');
        $orderValue = $connect->select($values)->from(FIRST)->order('key', 'ASK')->exec();
        if($orderValue)
        {
            $goodOrder = GOOD_ORDER;
        }else
        {
            $badOrder = BAD_ORDER;
        }
        break;
    case isset($_GET['selectLimit']):
        $values = array('key','data');
        $limitvalueFirst = $connect->select($values)->from(FIRST)->limit('5')->exec();
        if($limitvalueFirst)
        {
            $goodLimitById = GOOD_LIMIT_BY_ID;
        }else
        {
            $badLimitById = BAD_LIMIT_BY_ID;
        }
        break;
    case isset($_GET['updateLimit']):
        $updateData = array('user22','mysql');
        $limitSecond = $connect->update(FIRST)->set($updateData)->where('key','user2')->limit(1)->exec();
        if($limitSecond)
        {
            $goodUpdateLimit = GOOD_UPDATE_LIMIT;
        }else
        {
            $badUpdateLimit = BAD_UPDATE_LIMIT;
        }
        break;
    case isset($_GET['deleteLimit']):
        $deleteData = array('key','user2');
        $limitThird = $connect->delete()->from(FIRST)->where('key','user2')->limit(1)->exec();
        if($limitThird)
        {
            $goodDeleteLimit = GOOD_DELETE_LIMIT;
        }else
        {
            $badDeleteLimit = BAD_DELETE_LIMIT;
        }
        break;
}
include ('template/index.php');

?>
