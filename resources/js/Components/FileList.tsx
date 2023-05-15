import React, {useRef} from "react";
import { Inertia } from '@inertiajs/inertia';
import { ToastContainer, toast } from 'react-toastify';

interface FileUploadFormProps {
    files: string[];
}
const FileList:React.FC<FileUploadFormProps> = ({ files }) => {
    return (
        <div>
            {files.map((file) => (
                <div key={file}>
                    {file}
                </div>
            ))}
        </div>
    )
}

export default FileList;
