<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Consts;

/**
 * CakePHP標準基本コントローラ
 *
 */
class BaseXController extends Controller{
	
    
	// 更新ユーザーなど共通フィールドをデータにセットする。
	protected function setCommonToData($data){
	
		// 更新ユーザー
	    $update_user = '';
	    if(!empty(\Auth::user())){
	        $update_user = \Auth::user()->name; // ユーザー名
	    }
		
		// ユーザーエージェント
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$user_agent = mb_substr($user_agent,0,255);
	
		// IPアドレス
		$ip_addr = $_SERVER["REMOTE_ADDR"];
	
		// 本日
		$today = date('Y-m-d H:i:s');
	
		// データにセットする
		foreach($data as $i => $ent){
				
			$ent['update_user'] = $update_user;
			$ent['user_agent'] = $user_agent;
			$ent['ip_addr'] = $ip_addr;
				
			// idが空（新規入力）なら生成日をセットし、空でないなら除去
			if(empty($ent['id'])){
				$ent['created'] = $today;
			}else{
				unset($ent['created']);
			}
				
			$ent['modified'] = $today;
	
				
			$data[$i] = $ent;
		}
	
		return $data;
	
	}
	
	
	
	// 更新ユーザーなど共通フィールドをセットする。
	protected function setCommonToEntity($ent){
		
	    // 更新ユーザーの取得とセット
	    $update_user = 'none';
	    if(!empty(\Auth::user())){
	        $update_user = \Auth::user()->name; // ユーザー名
	    }
		$ent['update_user'] = $update_user;
		
		// ユーザーエージェントの取得とセット
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$user_agent = mb_substr($user_agent,0,255);
		$ent['user_agent'] = $user_agent;
		
		// IPアドレスの取得とセット
		$ip_addr = $_SERVER["REMOTE_ADDR"];
		$ent['ip_addr'] = $ip_addr;
		
		// idが空（新規入力）なら生成日をセットし、空でないなら除去
		if(empty($ent['id'])){
			$ent['created'] = date('Y-m-d H:i:s');
		}else{
			unset($ent['created']);
		}
		
		// 更新日時は除去（DB側にまかせる）
		if(isset($ent['modified'])){
			unset($ent['modified']);
		}
		
		return $ent;
		
	}
	
	/**
	 * 削除用のエンティティを取得する
	 * @param int $id ID
	 */
	protected function getEntForDelete($id){
		if(empty($id)){
			throw new Exception('IDが空です。');
		}
		
		$ent2 = array(
				'id'=>$id,
				'delete_flg'=>1,
		);
		
		// 更新ユーザーなど共通フィールドをセットする。
		$ent2 = $this->setCommonToEntity($ent2);
		
		return $ent2;
	}

	
	/**
	 * ユーザー情報を取得する
	 *
	 * @return [] <mixied> ユーザー情報
	 */
	public function getUserInfo($param=[]){
		
		// ユーザー情報の構造
		$userInfo = [
			'id'=> 0,
			'user_id'=> 0,
		    'name' => '',
		    'username' => '',
		    'user_name' => '',
		    'update_user' => '',
			'ip_addr' => '',
			'user_agent' => '',
			'email'=>'',
			'role' => 'oparator',
			'delete_flg' => 0,
			'nickname' => '',
		    'authority_wamei'=>'',
		    'authority_name'=>'',
		    'authority_level'=>0, // 権限レベル(権限が強いほど大きな数値）
		];
		
		if(\Auth::id()){// idは未ログインである場合、nullになる。
			$userInfo['id'] = \Auth::id(); // ユーザーID
			$userInfo['user_id'] = $userInfo['id'];
			$userInfo['name'] = \Auth::user()->name; // ユーザー名
			$userInfo['username'] = $userInfo['name'] ;
			$userInfo['user_name'] = $userInfo['name'];
			$userInfo['update_user'] = $userInfo['name'];
			$userInfo['email'] = \Auth::user()->email; // メールアドレス
			$userInfo['role'] = \Auth::user()->role; // メールアドレス
			$userInfo['nickname'] = \Auth::user()->nickname; // メールアドレス
		}
		
		$userInfo['ip_addr'] = $_SERVER["REMOTE_ADDR"];// IPアドレス
		$userInfo['user_agent'] = $_SERVER['HTTP_USER_AGENT']; // ユーザーエージェント
		
		if(!empty($userInfo['id'])){
			$users = \DB::select("SELECT * FROM users WHERE id={$userInfo['id']}");
			$users = $users[0];
			$userInfo['role'] = $users->role;
			$userInfo['delete_flg'] = $users->delete_flg;
			
		}
		
		// 権限が空であるならオペレータ扱いにする
		if(empty($userInfo['role'])){
			$userInfo['role'] = 'oparator';
		}
		
		// 権限まわり
		$role = $userInfo['role'];
 		$userInfo['authority'] = $this->getAuthority($role);
 		$userInfo['authority_wamei'] = $userInfo['authority']['wamei'];
 		$userInfo['authority_name'] = $userInfo['authority']['name'];
 		$userInfo['authority_level'] = $userInfo['authority']['level'];
 		
		return $userInfo;
	}
	
	
	/**
	 *  レビューモード用ユーザー情報を取得
	 * @param [] $userInfo
	 * @return [] $userInfo
	 */
	public function getUserInfoForReviewMode(){
	    
	    $userInfo = $this->getUserInfo();
		
		$userInfo['id'] = -1;
		$userInfo['user_id'] = $userInfo['id'];
		$userInfo['update_user'] = 'dummy';
		$userInfo['username'] = $userInfo['update_user'];
		$userInfo['update_user'] = $userInfo['update_user'];
		$userInfo['ip_addr'] = 'dummy_ip';
		$userInfo['user_agent'] = 'dummy_user_agent';
		$userInfo['email'] = 'dummy@example.com';
		$userInfo['role'] = 'admin';
		$userInfo['delete_flg'] = 0;
		$userInfo['nickname'] = '見本ユーザー';
		$userInfo['review_mode'] = 1; // 見本モードON;
		
		$userInfo['authority'] = $this->getAuthority($role);
		$userInfo['authority_wamei'] = $userInfo['authority']['wamei'];
		$userInfo['authority_name'] = $userInfo['authority']['name'];
		$userInfo['authority_level'] = $userInfo['authority']['level'];
		
		return $userInfo;
	}
	
	/**
	 * 権限情報を取得する
	 * @return [] 権限情報
	 */
	public function gettAuthorityInfo(){
	    return \App\Consts\ConstUser::AUTHORITY_INFO;
	}
	
	
	/**
	 * 権限に紐づく権限エンティティを取得する
	 * @param string $role 権限
	 * @return array 権限エンティティ
	 */
	private function getAuthority($role){

		// 権限情報を取得する
		$authorityData = $this->gettAuthorityInfo();
		
		$authority = [];
		if(!empty($authorityData[$role])){
			$authority = $authorityData[$role];
		}
		
		return $authority;
	}
	

	
	
	
	/**
	 * ユーザーをアプリケーションからログアウトさせる
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function logout(Request $request)
	{
	    \Auth::logout();
	    
	    $request->session()->invalidate();
	    
	    $request->session()->regenerateToken();
	    
	    return redirect('/');
	}
	

}