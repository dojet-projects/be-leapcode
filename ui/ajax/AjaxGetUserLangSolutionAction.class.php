<?php
/**
 * ajax, get user solution by specified lang.
 *
 * Filename: AjaxGetUserLangSolutionAction.class.php
 *
 * @author liyan
 * @since 2017 3 8
 */
class AjaxGetUserLangSolutionAction extends LeapPageBaseAction {

    protected function pageExecute($is_signin) {
        $lang = MRequest::post('lang');
        $qno = MRequest::post('qno');

        $code = null;
        if ($is_signin) {
            // 尝试获取用户solution代码
            $uid = $this->me->uid();
            $solution = DalSolution::getSolution($uid, $qno, $lang);
            if (!is_null($solution)) {
                $code = $solution['code'];
            }
        }

        if (is_null($code)) {
            // 读取默认的solution代码
            $coderoot = Config::runtimeConfigForKeyPath('global.coderoot');
            $path = sprintf("%squestions/codes/%d/code/%s/solution/solution.php", $coderoot, $qno, $lang);
            $code = file_get_contents($path);
        }

        return $this->displayJsonSuccess(['code' => $code, 'lang' => $lang]);
    }

}
