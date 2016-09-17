<?php

/**
 * 前端调度器
 */
final class Front
{
    /**
     *
     * @var Registry 容器 
     */
    private $registry;
    private $pre_actions = [];
    private $error;

    /**
     *
     * @var Registry $registry 容器 
     */
    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function addPreAction(Action $pre_action)
    {
        $this->pre_actions[] = $pre_action;
    }

    public function dispatch(Action $action, Action $error)
    {
        $this->error = $error;

        foreach ($this->pre_actions as $pre_action) {
            $result = $this->execute($pre_action);

            if ($result instanceof Action) {
                $action = $result;

                break;
            }
        }

        while ($action instanceof Action) {
            $action = $this->execute($action);
        }
    }

    private function execute(Action $action)
    {
        $result = $action->execute($this->registry);

        if ($result instanceof Action) {
            return $result;
        }

        if ($result instanceof Exception) {
            $action = $this->error;

            $this->error = null;

            return $action;
        }
    }

}
