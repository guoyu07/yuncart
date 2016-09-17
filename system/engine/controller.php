<?php

/**
 * 控制器
 * @property Config $config 配置管理组件
 * @property Event $event 事件管理组件
 * @property Loader $load 对象加载组件
 * @property Request $request 请求管理组件
 * @property Response $response 响应组件
 * @property Session $session 会话管理组件
 * @property Cache $cache 缓存管理组件
 * @property DB $db db连接组件
 * @property Url $url URL组件
 * @property Language $language 语言管理组件
 * @property Document $document html文档组件
 * @property \Cart\Customer $customer 当前用户,startup控制器执行后放到Registry中
 * @property \Cart\Affiliate $affiliate 当前用户,startup控制器执行后放到Registry中
 * @property \Cart\Currency $currency 当前用户,startup控制器执行后放到Registry中
 * @property \Cart\Tax $tax 当前用户,startup控制器执行后放到Registry中
 * @property \Cart\Cart $cart 当前用户,startup控制器执行后放到Registry中
 * @property \Cart\Weight $weight 当前用户,startup控制器执行后放到Registry中
 * @property \Cart\Length $length 当前用户,startup控制器执行后放到Registry中
 * @property Encryption $encryption 当前用户,startup控制器执行后放到Registry中
 * @property Openbay $openbay 当前用户,startup控制器执行后放到Registry中
 * @property Log $log 当前用户,startup/error控制器执行后放到Registry中
 */
abstract class Controller
{

    protected $registry;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function __get($key)
    {
        return $this->registry->get($key);
    }

    public function __set($key, $value)
    {
        $this->registry->set($key, $value);
    }

}
