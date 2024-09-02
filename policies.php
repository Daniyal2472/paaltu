<?php

// Policy functions

function can_view_pet($user, $pet) {
    if ($user['role'] === 'Admin') {
        return true;
    }
    if(isset($user['id']) && isset($pet['owner_id'])) {
        return $user['id'] == $pet['owner_id'];
    }
}

function can_update_pet($user, $pet) {
    if ($user['role'] === 'Admin') {
        return true;
    }
    if(isset($user['id']) && isset($pet['owner_id'])) {
        return $user['id'] == $pet['owner_id'];
    }
}

function can_delete_pet($user, $pet) {
    if ($user['role'] === 'Admin') {
        return true;
    }
    if(isset($user['id']) && isset($pet['owner_id'])) {
        return $user['id'] === $pet['owner_id'];
    }
}

function can_create_pet($user) {
    return $user['role'] === 'Admin';
}

function can_create_category($user) {
    return $user['role'] === 'Admin';
}

function can_view_category($user) {
    return $user['role'] === 'Admin';
}

function can_update_category($user) {
    return $user['role'] === 'Admin';
}

function can_delete_category($user) {
    return $user['role'] === 'Admin';
}

function can_create_food($user) {
    return $user['role'] === 'Admin';
}

function can_view_food($user) {
    return $user['role'] === 'Admin';
}

function can_update_food($user) {
    return $user['role'] === 'Admin';
}

function can_delete_food($user) {
    return $user['role'] === 'Admin';
}

function can_create_accessory($user) {
    return $user['role'] === 'Admin';
}

function can_delete_accessory($user) {
    return $user['role'] === 'Admin';
}

function can_update_accessory($user) {
    return $user['role'] === 'Admin';
}

function can_view_accessory($user) {
    return $user['role'] === 'Admin';
}

function can_create_doctors($user) {
    return $user['role'] === 'Admin';
}

function can_view_doctors($user) {
    return $user['role'] === 'Admin';
}

function can_update_doctors($user) {
    return $user['role'] === 'Admin';
}

function can_delete_doctors($user) {
    return $user['role'] === 'Admin';
}

function can_create_users($user) {
    return $user['role'] === 'Admin';
}

function can_view_appointment($user) {
    return $user['role'] === 'Admin';
}

function can_update_appointment($user) {
    return $user['role'] === 'Admin';
}

function can_delete_appointment($user) {
    return $user['role'] === 'Admin';
}

function can_view_seller($user) {
    return $user['role'] === 'Admin';
}

function can_view_order($user) {
    return $user['role'] === 'Admin';
}

function can_view_order_users($user, $order) {
    // Allow admins to view all orders
    if ($user['role'] === 'Admin') {
        return true;
    }
    // Allow users to view only their own orders
    if (isset($user['id']) && isset($order['user_id'])) {
        return $user['id'] === $order['user_id'];
    }
}

function can_update_order($user) {
    return $user['role'] === 'Admin';
}

function can_view_users($user) {
    return $user['role'] === 'Admin';
}

function can_view_orders($user) {
    return $user['role'] === 'Admin';
}

function can_update_users($user) {
    return $user['role'] === 'Admin';
}

function can_delete_users($user) {
    return $user['role'] === 'Admin';
}

function can_update_seller($user) {
    return $user['role'] === 'Admin';
}

function can_delete_seller($user) {
    return $user['role'] === 'Admin';
}

// Authorization function

function authorize($action, $user, $model = null) {
    $policies = [
        'view_pet'   => 'can_view_pet',
        'update_pet' => 'can_update_pet',
        'delete_pet' => 'can_delete_pet',
        'create_pet' => 'can_create_pet',
        'view_category' => 'can_view_category',
        'create_category' => 'can_create_category',
        'update_category' => 'can_update_category',
        'delete_category' => 'can_delete_category',
        'create_users' => 'can_create_users',
        'create_accessory' => 'can_create_accessory',
        'delete_accessory' => 'can_delete_accessory',
        'update_accessory' => 'can_update_accessory',
        'view_accessory' => 'can_view_accessory',
        'view_appointment' => 'can_view_appointment',
        'update_appointment' => 'can_update_appointment',
        'delete_appointment' => 'can_delete_appointment',
        'view_doctors' => 'can_view_doctors',
        'update_doctors' => 'can_update_doctors',
        'delete_doctors' => 'can_delete_doctors',
        'create_doctors' => 'can_create_doctors',
        'view_food' => 'can_view_food',
        'update_foods' => 'can_update_food',
        'delete_foods' => 'can_delete_food',
        'create_food' => 'can_create_food',
        'view_seller' => 'can_view_seller',
        'view_order' => 'can_view_order',
        'update_order' => 'can_update_order',
        'view_users' => 'can_view_users',
        'view_orders' => 'can_view_orders',
        'update_users' => 'can_update_users',
        'delete_users' => 'can_delete_users',
        'update_seller' => 'can_update_seller',
        'delete_seller' => 'can_delete_seller',
        'view_orders_users' => 'can_view_orders_users',
    ];

    if (isset($policies[$action])) {
        return $policies[$action]($user, $model);
    }

    return false;
}
