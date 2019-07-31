<?php
Configure::write('Admin.Message', array(
    'DbUpdateSuccess'          => 'データの保存に成功しました。',
    'DbDeleteSuccess'          => 'データを削除しました。',
    'DbDeleteFailed'           => 'データの削除に失敗しました。',
    'DbDeleteFailedForeignKey' => '%sを使用しているデータが存在するため、削除できませんでした。',
    'DbDeleteFailedRowLarge'   => '各項目に入力された情報が大きすぎるため、保存することができません。',
    'ValidateError'            => '入力エラーがあります。',
    'ValidateErrorPhotoCancel' => '入力エラーがあったため、画像のアップロードをキャンセルしました。他の全ての入力エラーを取り除いた上で画像をアップロードしてください。',
    'AccessDataNotFound'       => '存在しないデータにアクセスしようとしています。',
    'AccessDataLoginUser'      => 'ログイン中のユーザー情報は、削除機能をご利用になれません。',
    'UpdateAlertExists'        => '更新期限が過ぎている物件があります。',
    'UpdateAlertEmpty'         => '更新期限が過ぎている物件はありません。',
    'AuthFailed'               => '現在のログイン情報ではアクセスできないページにアクセスしたため、ログイン後トップページへ移動しました。',
    'AutoLogout'               => 'ログインしてください。（一定時間操作が行われなかった場合、自動ログアウトされます。）',

    'Title'                    => '%s | TDC 物件管理CMS',
));
