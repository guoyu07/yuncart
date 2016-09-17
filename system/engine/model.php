<?php

/**
 * 不能算是标准的模型,最多只能算DAO对象
 * @property Db $db db连接组件
 * @property Config $config 配置管理组件
 * @property Event $event 事件管理组件
 * @property Loader $load 对象加载组件
 * @property Cache $cache 缓存管理组件
 * @property \Cart\Customer $customer 当前用户,在执行startup控制器后放到Registry中
 */
abstract class Model
{
    /**
     *
     * @var Registry 容器 
     */
    protected $registry;

    /**
     *
     * @var Registry $registry 容器 
     */
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
