<?php

namespace Apps\Console\Commands;

use Mix\Database\Persistent\PDOConnection;
use Mix\Console\ExitCode;
use Mix\Facades\Input;
use Mix\Facades\Output;

/**
 * 单进程范例
 * @author 刘健 <coder.liu@qq.com>
 */
class ClearCommand extends BaseCommand
{

    // 初始化事件
    public function onInitialize()
    {
        parent::onInitialize(); // TODO: Change the autogenerated stub
        // 获取程序名称
        $this->programName = Input::getCommandName();
    }

    // 执行任务
    public function actionExec()
    {
        // 预处理
        parent::actionExec();

        // 使用长连接客户端，这样会自动帮你维护连接不断线
        $pdo = PDOConnection::newInstanceByConfig();

        // 执行业务代码
        // ...

        // 响应
        Output::writeln('SUCCESS');
        // 返回退出码
        return ExitCode::OK;
    }

}
