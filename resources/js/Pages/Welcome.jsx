import React, {useRef} from "react";
import { Inertia } from '@inertiajs/inertia';
const Welcome = () =>{

    const fileInput = useRef(null);
    const handleSubmit = (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append('file', fileInput.current.files[0]);
        Inertia.post('/', formData, {
            onSuccess: (page) => {
                console.log("success");
                if (page.props.message){
                    console.log(page.props.message);
                }
            },
            onError: (errors) => {
                console.log("error");
                console.log(errors.file);
            }
        });
    }

    return (
        <div>
            <input type="file" ref={fileInput} />
            <input type="submit" onClick={handleSubmit}/>
        </div>
    )

}

export default Welcome;
