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
            if ('php' === $lang) {
                $solution = $this->phpSolution($coderoot, $qno);
            } elseif ('java' === $lang) {
                $solution = $this->javaSolution($coderoot, $qno);
            } else {
                $solution = null;
            }

            $code = null;
            if (!is_null($solution)) {
                $code = file_get_contents($solution);
            }
        }

        return $this->displayJsonSuccess(['code' => $code, 'lang' => $lang]);
    }

    protected function phpSolution($coderoot, $qno) {
        return sprintf("%squestions/codes/%d/code/php/solution/solution.php", $coderoot, $qno);
    }

    protected function javaSolution($coderoot, $qno) {
        return sprintf("%squestions/codes/%d/code/java/solution/Solution.java", $coderoot, $qno);
    }

}
