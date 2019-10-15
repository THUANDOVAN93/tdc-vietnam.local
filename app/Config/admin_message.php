<?php
// Configure::write('Admin.Message', array(
//     'DbUpdateSuccess'          => 'データの保存に成功しました。',
//     'DbDeleteSuccess'          => 'データを削除しました。',
//     'DbDeleteFailed'           => 'データの削除に失敗しました。',
//     'DbDeleteFailedForeignKey' => '%sを使用しているデータが存在するため、削除できませんでした。',
//     'DbDeleteFailedRowLarge'   => '各項目に入力された情報が大きすぎるため、保存することができません。',
//     'ValidateError'            => '入力エラーがあります。',
//     'ValidateErrorPhotoCancel' => '入力エラーがあったため、画像のアップロードをキャンセルしました。他の全ての入力エラーを取り除いた上で画像をアップロードしてください。',
//     'AccessDataNotFound'       => '存在しないデータにアクセスしようとしています。',
//     'AccessDataLoginUser'      => 'ログイン中のユーザー情報は、削除機能をご利用になれません。',
//     'UpdateAlertExists'        => '更新期限が過ぎている物件があります。',
//     'UpdateAlertEmpty'         => '更新期限が過ぎている物件はありません。',
//     'AuthFailed'               => '現在のログイン情報ではアクセスできないページにアクセスしたため、ログイン後トップページへ移動しました。',
//     'AutoLogout'               => 'ログインしてください。（一定時間操作が行われなかった場合、自動ログアウトされます。）',

//     'Title'                    => '%s | TDC 物件管理CMS',
// ));

Configure::write('Admin.Message', array(
    'DbUpdateSuccess'          => 'The data was saved successfully.',
    'DbDeleteSuccess'          => 'Data has been deleted.',
    'DbDeleteFailed'           => 'Deletion of data failed.',
    'DbDeleteFailedForeignKey' => 'Could not delete because there is data using %s.',
    'DbDeleteFailedRowLarge'   => 'The information entered for each item is too large to save.',
    'ValidateError'            => 'There is an input error.',
    'ValidateErrorPhotoCancel' => 'The image upload was canceled due to an input error. Please upload the image after removing all other input errors.',
    'AccessDataNotFound'       => 'You are trying to access data that does not exist.',
    'AccessDataLoginUser'      => 'The deletion function cannot be used for logged-in user information.',
    'UpdateAlertExists'        => 'Some properties have expired.',
    'UpdateAlertEmpty'         => 'There are no renewal deadlines.',
    'AuthFailed'               => 'I moved to the top page after logging in because I accessed a page that was not accessible with the current login information.',
    'AutoLogout'               => 'Please login. (If no operation is performed for a certain period of time, you will be automatically logged out.)',

    'Title'                    => '%s | TDC Property management CMS',
));
