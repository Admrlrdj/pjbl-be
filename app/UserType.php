<?php

namespace App;

enum UserType: string
{
    case Owner = 'owner';
    case Admin = 'admin';
}
