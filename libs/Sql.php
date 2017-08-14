<?php
class SQL
{
    protected $sql;
    protected $selectVal;
    protected $fromVal;
    protected $whereVal;
    protected $insertVal;
    protected $valuesVal;
    protected $deleteVal;
    protected $updateVal;
    protected $setVal;
    protected $crossJoinVal;
    protected $naturalJoinVal;
    protected $innerJoinVal;
    protected $leftOuterJoinVal;
    protected $rightOuterJoinVal;
    protected $groupVal;
    protected $havingVal;
    protected $orderVal;
    protected $limitVal;
    public function select(array $varWhat)
    {
        if (!empty($varWhat) && $varWhat !== "*") {
            $this->selectVal = "SELECT `$varWhat[0]`,`$varWhat[1]` ";
            return $this;
        } else {
            return false;
        }
        return false;
    }

    public function crossJoin($table)
    {
        if (!empty($table) && isset($table)) {
            $this->crossJoinVal = ' CROSS JOIN ' . $table;
            return $this;
        } else {
            return false;
        }
        return false;
    }
    public function selectDistinct(array $varWhat)
    {
        if (!empty($varWhat) && $varWhat !== "*") {
            $this->selectDistinctVal = "SELECT DISTINCT `$varWhat[0]`,`$varWhat[1]` ";
            return $this;
        } else {
            return false;
        }
        return false;
    }

    public function naturalJoin($table)
    {
        if (!empty($table) && isset($table)) {
            $this->naturalJoinVal = ' NATURAL JOIN ' . $table;
            return $this;
        } else {
            return false;
        }
        return false;
    }

    public function innerJoin($table, $idFirst, $idSecond)
    {
        if (!empty($table) && isset($table) && !empty($idFirst) && isset($idFirst) && !empty($idSecond) && isset($idSecond)) {
            $this->innerJoinVal = ' INNER JOIN ' . $table . ' ON ' . $idFirst . ' = ' . $idSecond;
            return $this;
        } else {
            return false;
        }
        return false;
    }

    public function leftOuterJoin($table, $idFirst, $idSecond)
    {
        if (!empty($table) && isset($table) && !empty($idFirst) && isset($idFirst) && !empty($idSecond) && isset($idSecond)) {
            $this->leftOuterJoinVal = ' LEFT OUTER JOIN ' . $table . ' ON ' . $idFirst . '=' . $idSecond;
            return $this;
        } else {
            return false;
        }
        return false;
    }

    public function rightOuterJoin($table, $idFirst, $idSecond)
    {
        if (!empty($table) && isset($table) && !empty($idFirst) && isset($idFirst) && !empty($idSecond) && isset($idSecond)) {
            $this->rightOuterJoinVal = ' RIGHT OUTER JOIN ' . $table . ' ON ' . $idFirst . '=' . $idSecond;
            return $this;
        } else {
            return false;
        }
        return false;
    }


	public function group($val)
    {
    	if(!empty($val) && isset($val))
		{
            $this->groupVal = ' group by '.$val;
            return $this;
		}else
		{
            return false;
		}
        return false;
    }
    public function having($val)
    {
        if(!empty($val) && isset($val)) {
            $this->havingVal = ' having ' . $val;
            return $this;
        }else
        {
            return false;
        }
        return false;
    }
    public function order($val, $valByWhatSort)
    {
        if(!empty($val) && isset($val) && !empty($valByWhatSort) && isset($valByWhatSort) ) {
            $this->orderVal = ' order by ' . $val . ' ' . $valByWhatSort;
            return $this;
        }
        else
        {
            return false;
        }
        return false;
    }
    public function limit($val)
    {
        if(!empty($val) && isset($val)) {
            $this->limitVal = ' limit ' . $val;
            return $this;
        }else
        {
            return false;
        }
        return false;
    }

	
	public function from($table,$table2=false,$coma = false)
	{
		if(!empty($table))
		{
			$this->fromVal = "FROM $table $coma $table2 ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	
	public function where($key, $values)
	{
		if(!empty($key) && !empty($values))
		{
			
			$this->whereVal = "WHERE `$key` = '$values' ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	public function insert($varWhat)
	{
		if(!empty($varWhat))
		{
			$this->insertVal = "INSERT INTO `$varWhat` ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	public function values(array $values)
	{
		if(!empty($values))
		{
			$this->valuesVal = "VALUES ('$values[0]','$values[1]') ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	
	public function update($varWhat)
	{
		if(!empty($varWhat))
		{
			$this->updateVal = "UPDATE `$varWhat`  ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	
	public function set(array $values)
	{
		if(!empty($values))
		{
			$this->setVal = "SET `key` = '$values[0]', data = '$values[1]'  ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	
	public function delete()
	{
			$this->deleteVal = "DELETE ";
			return $this;
		
	}

    public function exec()
    {
        switch(true)
        {
            case isset($this->selectVal):
                if(!isset($this->selectVal) || empty($this->selectVal) || $this->selectVal == '*')
                {
                    return false;
                }
                $this->sql .= $this->selectVal;
                break;
            case isset($this->selectDistinctVal):
                    if(!isset($this->selectDistinctVal) || empty($this->selectDistinctVal))
                    {
                        return false;
                    }

                    $this->sql .= $this->selectDistinctVal;
                    break;

            case isset($this->insertVal):
                if(!isset($this->insertVal) || empty($this->insertVal))
                {
                    return false;
                }
                $this->sql .= $this->insertVal;
                break;
            case isset($this->updateVal):
                if(!isset($this->updateVal) || empty($this->updateVal))
                {
                    return false;
                }

                $this->sql .= $this->updateVal;
                break;
            case isset($this->deleteVal):
                if(!isset($this->deleteVal) || empty($this->deleteVal))
                {
                    return false;
                }

                $this->sql .= $this->deleteVal;
                break;

        }

        if(isset($this->fromVal))
        {
            if(!isset($this->fromVal) || empty($this->fromVal))
            {
                return false;
            }

            $this->sql .= $this->fromVal;
        }
        if(isset($this->innerJoinVal))
        {
            if(!isset($this->innerJoinVal) || empty($this->innerJoinVal))
            {
                return false;
            }

            $this->sql .= $this->innerJoinVal;
        }
        if(isset($this->leftOuterJoinVal))
        {
            if(!isset($this->leftOuterJoinVal) || empty($this->leftOuterJoinVal))
            {
                return false;
            }

            $this->sql .= $this->leftOuterJoinVal;
        }
        if(isset($this->rightOuterJoinVal))
        {
            if(!isset($this->rightOuterJoinVal) || empty($this->rightOuterJoinVal))
            {
                return false;
            }

            $this->sql .= $this->rightOuterJoinVal;
        }
        if(isset($this-> crossJoinVal))
        {
            if(!isset($this-> crossJoinVal) || empty($this-> crossJoinVal))
            {
                return false;
            }

            $this->sql .= $this->crossJoinVal;
        }
        if(isset($this->naturalJoinVal))
        {
            if(!isset($this->naturalJoinVal) || empty($this->naturalJoinVal))
            {
                return false;
            }

            $this->sql .= $this->naturalJoinVal;
        }
        if(isset($this->setVal))
        {
            if(!isset($this->setVal) || empty($this->setVal))
            {
                return false;
            }

            $this->sql .= $this->setVal;
        }
        if(isset($this->valuesVal))
        {
            if(!isset($this->valuesVal) || empty($this->valuesVal))
            {
                return false;
            }

            $this->sql .= $this->valuesVal;
        }
        if(isset($this->whereVal))
        {
            if(!isset($this->whereVal) || empty($this->whereVal))
            {
                return false;
            }

            $this->sql .= $this->whereVal;
        }

        if(isset($this->groupVal))
        {
            if(!isset($this->groupVal) || empty($this->groupVal))
            {
                return false;
            }

            $this->sql .= $this->groupVal;
        }
        if(isset($this->havingVal))
        {
            if(!isset($this->havingVal) || empty($this->havingVal))
            {
                return false;
            }

            $this->sql .= $this->havingVal;
        }
        if(isset($this->orderVal))
        {
            if(!isset($this->orderVal) || empty($this->orderVal))
            {
                return false;
            }

            $this->sql .= $this->orderVal;
        }
        if(isset($this->limitVal))
        {
            if(!isset($this->limitVal) || empty($this->limitVal))
            {
                return false;
            }

            $this->sql .= $this->limitVal;
        }



        return $this->sql;

    }




    }

?>
