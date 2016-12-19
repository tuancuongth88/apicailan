<?php
class Common {

	public static function returnData($code = 200, $message = SUCCESS, $userId = '', $sessionId = '', $data = null)
	{
		return Response::json([
				'code' => $code,
				'message' => $message,
				'user_id' => $userId,
				'session_id' => $sessionId,
				'data' => $data,
			]);
	}
	public static function returnDataNotUser($data = null)
	{
		return Response::json(['data' => $data]);
	}
	public static function getSessionId($input, $userId)
	{		
		$sessionId = generateRandomString();
		User::where('id', $userId)->update([ 'session_id'=>$sessionId]);
		return $sessionId;
	}
	public static function getCategoryWithLike($input)
	{
		// $cats = Common::getListArray('Category', ['id', 'name']);
		$cats = Category::all();
		if($cats) {
			foreach($cats as $key => $value) {
				$data[$key] = [
					'id' => $value->id,
					'name' => $value->name,
				];				
			}
		}
		$data = array_merge(['0'=>array('id'=>0, 'name'=>'Home')], $data);
		return $data;
	}
	public static function checkSessionId($input)
	{
		$user = User::where('session_id', $input['session_id'])
						->where('id', $input['user_id'])
						->first();
		if(!empty($user)) {
			return $input['session_id'];
		}
		return false;
	}
	public static function checkSessionLogin($input)
	{
		$sessionId = Common::checkSessionId($input);
		if (!$sessionId) {
			throw new Prototype\Exceptions\UserSessionErrorException();
		}
		return $sessionId;
	}

}