import React, {useRef} from "react";
import { Inertia } from '@inertiajs/inertia';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

const FileUploadForm = () => {
    const file = useRef(null);

    const handleSubmit = (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append('file', file.current.files[0]);
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

    const notify = () => toast.info("Wow so easy!");

    return (
        <div>
            <div>
                <input type="file" ref={file}/>
                <input type="submit" onClick={handleSubmit}/>
            </div>
            <div>
                <button onClick={notify}>sasa</button>
                <ToastContainer
                    position="top-center"
                    autoClose={5000}
                    hideProgressBar={false}
                    newestOnTop={false}
                    closeOnClick
                    rtl={false}
                    pauseOnFocusLoss
                    draggable
                    pauseOnHover
                    theme="dark"
                />
            </div>
        </div>
    )
}

export default FileUploadForm;
