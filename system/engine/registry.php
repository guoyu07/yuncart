<?php

/**
 * 依赖注入管理容器
 */
final class Registry
{
    /**
     *
     * @var array 组件容器
     */
    private $data = [];

    /**
     * 获取指定组件对象
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return (isset($this->data[$key]) ? $this->data[$key] : null);
    }

    /**
     * 设置指定组件对象
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * 判断指定组件对象是否被注册
     * @param string $key
     * @return boolean
     */
    public function has($key)
    {
        return isset($this->data[$key]);
    }

}
