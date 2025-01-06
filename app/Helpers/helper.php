<?php

function user()
{
    return auth('web')->user();
}

function user_id()
{
    return auth('web')->user()->id;
}
