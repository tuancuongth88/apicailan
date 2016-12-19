<?php

class LogoutController extends ApiController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function logout()
	{
		$input = Input::all();
		$user = User::where('user_id', $input['user_id'])
						->first();
		if($user) {
			if($user->session_id == $input['session_id']) {
                User::find($user->id)->update(['session_id' => null]);
                return Common::returnData(200, SUCCESS, $input['user_id'], '');
            } else {
            	throw new Prototype\Exceptions\UserSessionErrorException();
            }
		}
		throw new Prototype\Exceptions\DeviceErrorException();
	}

}
