class MemoirsController extends ConnectionServer{

    static destroy(id)
    {
        return new Promise(resolve => {
            this.sendRequest(`memoirs/${id}`,'DELETE',null,resolve,true)
        })
    }

}
