<?php

namespace App;

class TaskPriorityCalculation
{
    public function calculatePriorirty($description)
    {
        return ceil(strlen($description)/10);
    }

}
